<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsors extends Model
{
    use HasFactory;

    protected $table = 'sponsors';
    protected $primaryKey = 'sponsor_id';
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing= false;

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    // public function sponsortype()
    // {
    //     return $this->belongsTo(SponsorType::class, 'sponsor_type_id');
    // }
    
    // public function patientSponsors()
    // {
    //     return $this->hasMany(PatientSponsor::class, 'sponsor_id');
    // }

    protected $fillable = [
        'sponsor_id',
        'sponsor_type_id',
        'sponsor_name',
        'user_id',
        'added_id',
        'added_date',
        'udpated_by',
        'status',
        'archived',
        'archived_id',
        'archived_by',
        'archived_date'
    ];
}
