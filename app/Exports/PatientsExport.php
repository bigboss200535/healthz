<?php

namespace App\Exports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Http\Request;

class PatientsExport implements FromCollection, WithHeadings, WithMapping, WithTitle
{
    protected $request;
    
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $query = Patient::query();
        
        // Join related tables
        $query->with(['gender', 'religion', 'sponsor']);
        
        // Apply filters
        if ($this->request->gender_id) {
            $query->where('gender_id', $this->request->gender_id);
        }
        
        if ($this->request->religion_id) {
            $query->where('religion_id', $this->request->religion_id);
        }
        
        if ($this->request->sponsor_id) {
            $query->whereHas('sponsor', function($q) {
                $q->where('sponsor_id', $this->request->sponsor_id);
            });
        }
        
        if ($this->request->sponsor_type_id) {
            $query->whereHas('sponsor', function($q) {
                $q->where('sponsor_type_id', $this->request->sponsor_type_id);
            });
        }
        
        // Date filters
        if ($this->request->date_from) {
            $query->whereDate('added_date', '>=', $this->request->date_from);
        }
        
        if ($this->request->date_to) {
            $query->whereDate('added_date', '<=', $this->request->date_to);
        }
        
        // Only active patients
        $query->where('status', 'Active');
        $query->where('archived', 'No');
        
        return $query->get();
    }
    
    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'OPD Number',
            'Patient Name',
            'Gender',
            'Age',
            'Religion',
            'Telephone',
            'Sponsor',
            'Date Added'
        ];
    }
    
    /**
     * @param mixed $patient
     * @return array
     */
    public function map($patient): array
    {
        return [
            $patient->opd_number ?? 'N/A',
            $patient->fullname ?? ($patient->firstname . ' ' . $patient->lastname),
            $patient->gender->gender ?? 'N/A',
            $this->calculateAge($patient->birth_date) ?? 'N/A',
            $patient->religion->religion ?? 'N/A',
            $patient->telephone ?? 'N/A',
            $patient->sponsor->sponsor_name ?? 'N/A',
            $patient->added_date ? date('Y-m-d', strtotime($patient->added_date)) : 'N/A'
        ];
    }
    
    /**
     * @return string
     */
    public function title(): string
    {
        return 'Patient Report';
    }
    
    /**
     * Calculate age from birth date
     */
    private function calculateAge($birthDate)
    {
        if (!$birthDate) {
            return null;
        }
        
        return date_diff(date_create($birthDate), date_create('today'))->y;
    }
}