<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChaCaracteristica extends Model
{
    use HasFactory;

    protected $table='cha_caracteristica';

    protected $fillable = [
        'cha_id',
        'caracteristica_id',
    ];

    public function caracteristica(){
        return $this->belongsTo(Caracteristica::class, 'caracteristica_id');
    }
   
}
