<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Patient Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            padding: 0;
            font-size: 18px;
        }
        .filters {
            margin-bottom: 20px;
        }
        .filters h3 {
            font-size: 14px;
            margin-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .footer {
            margin-top: 20px;
            text-align: right;
            font-size: 10px;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="no-print" style="margin-bottom: 20px;">
        <button onclick="window.print()">Print Report</button>
        <button onclick="window.history.back()">Back to Report</button>
    </div>
    
    <div class="header">
        <h1>Patient Report</h1>
        <p>Generated on: {{ date('Y-m-d H:i:s') }}</p>
    </div>
    
    <div class="filters">
        <h3>Filters Applied:</h3>
        <ul>
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
    
    <table>
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
                    <td>{{ $patient->patient_id ?? 'N/A' }}</td>
                    <td>{{ $patient->fullname ?? 'N/A' }}</td>
                    <td>{{ $patient->gender->gender ?? 'N/A' }}</td>
                    <td>{{ \Carbon\Carbon::parse($patient->birth_date)->age ?? 'N/A' }}</td>
                    <td>{{ $patient->religion->religion ?? 'N/A' }}</td>
                    <td>{{ $patient->telephone ?? 'N/A' }}</td>
                    <td>
                        @if($patient->patientSponsors->count() > 0)
                            {{ $patient->patientSponsors->map(function($ps) { return $ps->sponsor->sponsor_name ?? 'N/A'; })->implode(', ') }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $patient->added_date ? date('Y-m-d', strtotime($patient->added_date)) : 'N/A' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" style="text-align: center;">No patients found matching the criteria</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <div class="footer">
        <p>Total Patients: {{ $patients->count() }}</p>
    </div>
    
    <script>
        // Auto-print when page loads
        window.onload = function() {
            setTimeout(function() {
                window.print();
            }, 500);
        };
    </script>
</body>
</html>