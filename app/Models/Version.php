<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    protected $table = 'versions';
    protected $fillable = [
        'nombre',
        'precio',
        'cilindrada',
        'tipo_combustible',
        'bluetooth',
        'modelo',
    ];
    protected $with = ['modelo'];
    public function modelo()
    {
        return $this->belongsTo(Modelo::class, 'modelo','id');
    }
    
}
