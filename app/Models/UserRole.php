<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    protected $table = 'user_roles';
    protected $primaryKey = 'role_id';
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing= false;

    protected $fillable = [
        'role_id',
        'role_name',
        'facility_id',
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
