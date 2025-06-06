<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $table = 'patient_episode';
    protected $primaryKey = 'episode_id';
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing = false;

    
    protected $fillable = [
        'episode_id',
        'patient_id',
        'pat_number',
        'request_date',
        'episode_clinic',
        'code',
        'facility_id',
        'user_id',
        // 'added_id',
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
