<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesFee extends Model
{
    use HasFactory;
    protected $table = 'services_fee';
    protected $primaryKey = 'service_fee_id';
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing= false;
}
