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
        'user_logs',
        'login_date',
        'login_time',
        'user_ip',
        'user_pc',
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
