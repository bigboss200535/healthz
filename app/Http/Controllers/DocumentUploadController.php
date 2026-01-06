<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;

class DocumentUploadController extends Controller
{
   public function upload_document(Request $request)
    {
        // validate data for upload
        $request->validate([
            'document_file' => 'required|file|mimes:pdf,jpg,jpeg,png,gif|max:5120',
            'document_type' => 'required|string',
            'patient_id' => 'required|string',
            'opd_number' => 'required|string'
        ]);
        
        // process and upload file
        $file = $request->file('document_file');
        $filename = 'healthz_'.time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('documents', $filename, 'public');
        
        // Generate document id
        $count = Document::count();
        $document_id = 'DOC' . str_pad($count + 1, 6, '0', STR_PAD_LEFT) . time();
        
        // Save Document to database with meta data
        $document = Document::create([
            'documents_id' => $document_id,
            'patient_id' => $request->patient_id,
            'opd_number' => $request->opd_number,
            'file_path' => $path,
            'file_name' => $filename,
            'file_type' => $file->getClientOriginalExtension(),
            'file_size' => $file->getSize(),
            'document_type' => $request->document_type,
            'mime_type' => $file->getMimeType(),
            'facility_id' => Auth::user()->facility_id,
            'user_id' => Auth::user()->user_id,
            'added_id' => Auth::user()->user_id,
            'added_by' => Auth::user()->user_fullname,
            'added_date' => now()->format('Y-m-d'),
            // 'status' => 'Active',
            // 'archived' => 'No'
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Document uploaded successfully',
            // 'document' => $document
        ]);
    }

    public function list_patient_documents(Request $request)
    {
        try {
            $patient_id = $request->input('patient_id');
            
            if ($patient_id) {
                // Get documents for specific patient
                $documents = Document::where('patient_id', $patient_id)
                    ->where('archived', 'No')
                    // ->orderBy('documents_id', 'desc')
                    ->get();
            } 

            $html = view('layouts.document_uploaded_list', compact('documents'))->render();
            
            return response()->json([
                'success' => true,
                'html' => $html
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error loading documents: ' . $e->getMessage(),
                'html' => '<div class="alert alert-danger">Error loading documents</div>'
            ]);
        }
    }

    public function download_document($document_id)
    {
        try {
            $document = Document::where('documents_id', $document_id)
                ->where('archived', 'No')
                ->firstOrFail();
            
            $filePath = storage_path('app/public/' . $document->file_path);
            
            if (!file_exists($filePath)) {
                return response()->json(['error' => 'File not found'], 404);
            }
            
            return response()->download($filePath, $document->file_name);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error downloading file: ' . $e->getMessage()], 500);
        }
    }


    public function delete_document($document_id)
    {
        try {
            $document = Document::where('documents_id', $document_id)
                ->where('archived', 'No')
                ->firstOrFail();
            
            // Soft Delete by marking as archived
            $document->update([
                'archived' => 'Yes',
                'archived_by' => Auth::user()->user_fullname ?? '',
                'archived_date' => now()->format('Y-m-d H:i:s')
            ]);
            
            return response()->json([
                'success' => true,
                'message' => 'Document deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting document: ' . $e->getMessage()
            ], 500);
        }
    }
}
