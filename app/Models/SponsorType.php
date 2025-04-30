<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsorType extends Model
{
    use HasFactory;

    protected $table = 'sponsor_type';
    protected $primaryKey = 'sponsor_type_id';
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing= false;

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sponsors()
    {
        return $this->hasMany(Sponsors::class, 'sponsor_type_id');
    }
    
    protected $fillable = [
        'sponsor_type_id',
        'sponsor_type',
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
