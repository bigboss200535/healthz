<x-app-layout>
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Patient Report Results</h4>
            <div class="btn-group">
                <a href="{{ route('reports.patients.export.pdf', request()->all()) }}" class="btn btn-danger" target="_blank">
                    <i class="fas fa-file-pdf"></i> Export PDF
                </a>
                <a href="{{ route('reports.patients.export.excel', request()->all()) }}" class="btn btn-success">
                    <i class="fas fa-file-excel"></i> Export Excel
                </a>
                <a href="{{ route('reports.patients.export.word', request()->all()) }}" class="btn btn-primary">
                    <i class="fas fa-file-word"></i> Export Word
                </a>
                <a href="{{ route('reports.patients.print', request()->all()) }}" class="btn btn-dark" target="_blank">
                    <i class="fas fa-print"></i> Print
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="filters mb-4">
                <h5>Filters Applied:</h5>
                <ul>
                    @if(request()->gender_id)
                        <li><strong>Gender:</strong> {{ \App\Models\Gender::find(request()->gender_id)->gender ?? request()->gender_id }}</li>
                    @endif
                    
                    @if(request()->religion_id)
                        <li><strong>Religion:</strong> {{ \App\Models\Religion::find(request()->religion_id)->religion ?? request()->religion_id }}</li>
                    @endif
                    
                    @if(request()->sponsor_id)
                        <li><strong>Sponsor:</strong> {{ \App\Models\Sponsors::find(request()->sponsor_id)->sponsor_name ?? request()->sponsor_id }}</li>
                    @endif
                    
                    @if(request()->sponsor_type_id)
                        <li><strong>Sponsor Type:</strong> {{ \App\Models\SponsorType::find(request()->sponsor_type_id)->sponsor_type ?? request()->sponsor_type_id }}</li>
                    @endif
                    
                    @if(request()->date_from && request()->date_to)
                        <li><strong>Date Range:</strong> {{ request()->date_from }} to {{ request()->date_to }}</li>
                    @elseif(request()->date_from)
                        <li><strong>Date From:</strong> {{ request()->date_from }}</li>
                    @elseif(request()->date_to)
                        <li><strong>Date To:</strong> {{ request()->date_to }}</li>
                    @endif
                </ul>
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
                                <td>{{ $patient->fullname ?? ($patient->firstname . ' ' . $patient->lastname) }}</td>
                                <td>{{ $patient->gender->gender ?? 'N/A' }}</td>
                                <td>
                                    @php
                                        $age = $patient->birth_date ? date_diff(date_create($patient->birth_date), date_create('today'))->y : 'N/A';
                                    @endphp
                                    {{ $age }}
                                </td>
                                <td>{{ $patient->religion->religion ?? 'N/A' }}</td>
                                <td>{{ $patient->telephone ?? 'N/A' }}</td>
                                <td>{{ $patient->sponsor->sponsor_name ?? 'N/A' }}</td>
                                <td>{{ $patient->added_date ? date('Y-m-d', strtotime($patient->added_date)) : 'N/A' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No patients found matching the criteria</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</x-app-layout>