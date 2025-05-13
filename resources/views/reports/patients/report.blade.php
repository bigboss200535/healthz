<x-app-layout>
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Patient Report</h4>
                    <div>
                        <a href="{{ route('patient.reports.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Filters
                        </a>
                        <button onclick="window.print()" class="btn btn-primary ml-2">
                            <i class="fas fa-print"></i> Print
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h5>Filters Applied:</h5>
                            <ul class="list-unstyled">
                                @if($request->gender_id)
                                    <li><strong>Gender:</strong> {{ \App\Models\Gender::find($request->gender_id)->gender ?? $request->gender_id }}</li>
                                @endif
                                
                                @if($request->religion_id)
                                    <li><strong>Religion:</strong> {{ \App\Models\Religion::find($request->religion_id)->religion ?? $request->religion_id }}</li>
                                @endif
                                
                                @if($request->sponsor_id)
                                    <li><strong>Sponsor:</strong> {{ \App\Models\Sponsors::find($request->sponsor_id)->sponsor_name ?? $request->sponsor_id }}</li>
                                @endif
                                
                                @if($request->sponsor_type_id)
                                    <li><strong>Sponsor Type:</strong> {{ \App\Models\SponsorType::find($request->sponsor_type_id)->sponsor_type ?? $request->sponsor_type_id }}</li>
                                @endif
                                
                                @if($request->date_from && $request->date_to)
                                    <li><strong>Date Range:</strong> {{ $request->date_from }} to {{ $request->date_to }}</li>
                                @elseif($request->date_from)
                                    <li><strong>Date From:</strong> {{ $request->date_from }}</li>
                                @elseif($request->date_to)
                                    <li><strong>Date To:</strong> {{ $request->date_to }}</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>OPD Number</th>
                                    <th>Patient Name</th>
                                    <th>Gender</th>
                                    <th>Age</th>
                                    <th>Religion</th>
                                    <th>Telephone</th>
                                    <th>Sponsor</th>
                                    <th>Date Added</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($patients as $patient)
                                    <tr>
                                        <td>{{ $patient->opd_number ?? 'N/A' }}</td>
                                        <td>{{ $patient->fullname ?? 'N/A' }}</td>
                                        <td>{{ $patient->gender ?? 'N/A' }}</td>
                                        <td>{{ $patient->age ?? 'N/A' }}</td>
                                        <td>{{ $patient->religion ?? 'N/A' }}</td>
                                        <td>{{ $patient->telephone ?? 'N/A' }}</td>
                                        <td>{{ $patient->sponsor_name ?? 'CASH PAYMENT' }}</td>
                                        <td>{{ date('Y-m-d', strtotime($patient->added_date)) ?? 'N/A' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No patients found matching the criteria</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-3">
                        <p><strong>Total Patients:</strong> {{ $patients->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>