<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicAttendanceType extends Model
{
    use HasFactory;

    protected $table = 'service_attendance_type';
    protected $primaryKey = 'attendance_type_id';
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing = false;

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    protected $fillable = [
        'attendance_type_id',
        'attendance_type',
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
