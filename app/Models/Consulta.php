<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'peso',
        'altura',
        'sexo',
        'dataDeNascimento',
        'gravidezAmamentacao',
        'intoleranciaAlimentar',
        'dorInflamatoria',
        'tempoDorCronica',
        'usoDeCha',
        'habitosAlimentares',
        'consumoDeAgua',
        'praticaExercicioFisico',
        'usoDeMedicamento',
        'consumoDeCha',
        'user_id',
        'fatoresDoCha',
        'status'
    ];

    public function sintomas() {
        return $this->hasMany(ConsultaSintoma::class, 'consulta_id');
    }
}
