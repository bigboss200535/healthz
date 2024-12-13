<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{
    use HasFactory;

    protected $table = 'user_logs';
    protected $primaryKey = 'log_id';
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing= false;

    // public function users()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    protected $fillable = [
        'log_id',
        'logname',
        'user_ip',
        'session_id',
        'user_id',
        'user_pc',
        'login_date',
        'login_time',
        'logout_date',
        'logout_time',
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
