<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    protected $table = 'user_roles';
    protected $primaryKey = 'user_roles_id';
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing= false;

    protected $fillable = [
        'user_roles_id',
        'role_type',
        'usage',
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

    // public function users()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    public function facility()
    {
        return $this->belongsTo(Facility::class, 'facility_id');
    }

    
    
    // public function permissions()
    // {
    //     return $this->belongsToMany(Permission::class, 'permission_roles', 'user_roles_id', 'permission_id')
    //                 ->withTimestamps();
    // }
}
