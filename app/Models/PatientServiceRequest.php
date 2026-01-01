<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientServiceRequest extends Model
{
    use HasFactory;

    protected $table = 'patient_services_requested';
    protected $primaryKey = 'service_request_id';
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing= false;
    
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class. 'gender_id');
    }

    public function age()
    {
        return $this->belongsTo(Age::class, 'age_id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    protected $fillable = [
        'service_request_id',
        'patient_id',
        'opd_number',
        'service_fee_id',
        'attendance_id',
        'service_id',
        'service_type_id',
        'cash_amount',
        'private_amount',
        'company_amount',
        'foreigners_amount',
        'facility_id',
        'gdrg_code',
        'sponsor_id',
        'sponsor_type_id',
        'allow_topup',
        'topup_amount',
        'gender_id',
        'age_id',
        'patient_type',
        'attendance_date',
        'user_id',
        'added_id',
        'added_date',
        'udpated_by',
        'status',
        'archived',
        'archived_id',
        'archived_by',
        'archived_date',
        '_token'
    ];


   

}
