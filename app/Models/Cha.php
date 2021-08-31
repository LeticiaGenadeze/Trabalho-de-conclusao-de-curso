<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Cha extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'cover',
    ];
    public function chaCaracteristica(){
        return $this->hasMany(ChaCaracteristica::class, 'cha_id')->with('caracteristica');
    }
}
