<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientSponsor extends Model
{
    protected $table = 'patient_sponsor';
    protected $primaryKey = 'patient_sponsor_id';
    public $timestamps = false;
    
    protected $fillable = [
        'patient_sponsor_id', 'patient_id', 'sponsor_id', 'sponsor_type_id',
        'member_id', 'status', 'added_date', 'added_id'
    ];
    
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'patient_id');
    }
    
    public function sponsor()
    {
        return $this->belongsTo(Sponsors::class, 'sponsor_id', 'sponsor_id');
    }
    
    public function sponsorType()
    {
        return $this->belongsTo(SponsorType::class, 'sponsor_type_id', 'sponsor_type_id');
    }
}
