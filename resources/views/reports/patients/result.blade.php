<x-app-layout>
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Patient Report Results</h4>
            <div class="d-flex gap-2">
                <a href="{{ route('reports.patients.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Report Form
                </a>
                <form action="{{ route('reports.patients.generate') }}" method="POST" class="d-inline">
                    @csrf
                    @if($request->gender_id)
                        <input type="hidden" name="gender_id" value="{{ $request->gender_id }}">
                    @endif
                    @if($request->religion_id)
                        <input type="hidden" name="religion_id" value="{{ $request->religion_id }}">
                    @endif
                    @if($request->sponsor_id)
                        <input type="hidden" name="sponsor_id" value="{{ $request->sponsor_id }}">
                    @endif
                    @if($request->sponsor_type_id)
                        <input type="hidden" name="sponsor_type_id" value="{{ $request->sponsor_type_id }}">
                    @endif
                    @if($request->date_from)
                        <input type="hidden" name="date_from" value="{{ $request->date_from }}">
                    @endif
                    @if($request->date_to)
                        <input type="hidden" name="date_to" value="{{ $request->date_to }}">
                    @endif
                    <div class="btn-group">
                        <button type="submit" name="action" value="pdf" class="btn btn-danger">
                            <i class="fas fa-file-pdf"></i> PDF
                        </button>
                        <button type="submit" name="action" value="excel" class="btn btn-success">
                            <i class="fas fa-file-excel"></i> Excel
                        </button>
                        <button type="submit" name="action" value="word" class="btn btn-info">
                            <i class="fas fa-file-word"></i> Word
                        </button>
                        <button type="submit" name="action" value="print" class="btn btn-secondary">
                            <i class="fas fa-print"></i> Print
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="filters mb-4">
                <h5>Filters Applied:</h5>
                <div class="row">
                    @if($request->gender_id)
                        <div class="col-md-3">
                            <strong>Gender:</strong> {{ \App\Models\Gender::find($request->gender_id)->gender ?? $request->gender_id }}
                        </div>
                    @endif
                    
                    @if($request->religion_id)
                        <div class="col-md-3">
                            <strong>Religion:</strong> {{ \App\Models\Religion::find($request->religion_id)->religion ?? $request->religion_id }}
                        </div>
                    @endif
                    
                    @if($request->sponsor_id)
                        <div class="col-md-3">
                            <strong>Sponsor:</strong> {{ \App\Models\Sponsors::find($request->sponsor_id)->sponsor_name ?? $request->sponsor_id }}
                        </div>
                    @endif
                    
                    @if($request->sponsor_type_id)
                        <div class="col-md-3">
                            <strong>Sponsor Type:</strong> {{ \App\Models\SponsorType::find($request->sponsor_type_id)->sponsor_type ?? $request->sponsor_type_id }}
                        </div>
                    @endif
                    
                    @if($request->date_from && $request->date_to)
                        <div class="col-md-3">
                            <strong>Date Range:</strong> {{ $request->date_from }} to {{ $request->date_to }}
                        </div>
                    @elseif($request->date_from)