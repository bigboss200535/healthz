<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientRelations extends Model
{
    use HasFactory;

    protected $table = 'patient_relations';
    protected $primaryKey = 'relations_id';
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing= false;

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $fillable = [
        'relations_id',
        'patient_id',
        'opd_number',
        'relation_name',
        'relationship',
        'contact',
        'telephone',
        'user_id',
        'added_id',
        'added_date',
        'updated_by',
        'status',
        'archived',
        'archived_id',
        'archived_by',
        'archived_date',
        '_token'
    ];
}
