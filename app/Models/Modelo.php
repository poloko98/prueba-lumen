<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table = 'modelo';
    protected $fillable = [
        'nombre',
        'Marca',
    ];
    protected $with = ['marca'];
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'Marca','id');
    }
}
