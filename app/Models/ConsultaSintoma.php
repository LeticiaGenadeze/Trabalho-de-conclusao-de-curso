<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultaSintoma extends Model
{
    use HasFactory;

    protected $table='consulta_sintoma';

    protected $fillable = [
        'consulta_id',
        'sintoma_id',
    ];

    public function sintoma(){
        return $this->belongsTo(Sintoma::class, 'sintoma_id');
    }
}