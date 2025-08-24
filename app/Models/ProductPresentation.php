<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPresentation extends Model
{
    use HasFactory;

    protected $table = 'product_presentation';
    protected $primaryKey = 'pp_id';
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing= false;

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    protected $fillable = [
        'pp_id',
        'presentation',
        'type_code',
        'is_active',
        'facility_id',
        'user_id',
        'added_id',
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
