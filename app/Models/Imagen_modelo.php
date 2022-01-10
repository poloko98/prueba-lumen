<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagen_modelo extends Model
{
    protected $table = 'imagen_modelos';
    protected $fillable = [
        'nombre',
        'imagen',
        'modelo',
    ];
    protected $with = ['modelo'];
    public function modelo()
    {
        return $this->belongsTo(Modelo::class, 'modelo','id');
    }
}
