<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultingRoom extends Model
{
    use HasFactory;
    protected $table = 'consulting_rooms';
    protected $primaryKey = 'consulting_room_id';
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing = false;
}
