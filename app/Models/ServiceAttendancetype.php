<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceAttendancetype extends Model
{
    use HasFactory;
    protected $table = 'service_attendance_type';
    protected $primaryKey = 'attendance_type_id';
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing = false;

    public function servicePoints()
    {
        return $this->belongsTo(ServicePoints::class, 'attendance_type_id');
    }

}
