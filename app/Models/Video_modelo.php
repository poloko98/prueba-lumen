<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video_modelo extends Model
{
    protected $table = 'video_modelos';
    protected $fillable = [
        'nombre',
        'video',
        'modelo',
    ];
    protected $with = ['modelo'];
    public function modelo()
    {
        return $this->belongsTo(Modelo::class, 'modelo','id');
    }
}
