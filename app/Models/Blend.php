<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blend extends Model
{
    use HasFactory;

    protected $fillable = [
        'consulta_id',
        'cha_id',
    ];

    public function consulta(){
        return $this->belongsTo(Consulta::class, 'consulta_id');
    }

    public function cha(){
        return $this->belongsTo(Cha::class, 'cha_id');
    }
}
