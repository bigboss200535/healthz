<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;

    protected $table = 'user_permissions';
    protected $primaryKey = 'user_permissions_id';
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing= false;

    public function permissions()
    {
        return $this->hasMany(Permissions::class, 'permission_id');
    }

    public function permissionRoles()
    {
        return $this->hasMany(PermissionRole::class, 'role_id');
    }

    public function userRoles()
    {
        return $this->hasMany(UserRole::class, 'user_roles_id');
    }

    protected $fillable = [
        'user_permissions_id',
        'permission_id',
        'user_roles_id',
        'is_granted',
        'can_read', 
        'can_create',
        'can_delete',
        'can_update',
        'user_id',
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
