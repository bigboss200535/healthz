<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePoints extends Model
{
    use HasFactory;
    protected $table = 'service_points';
    protected $primaryKey = 'service_point_id';
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing = false;

}
