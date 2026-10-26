<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekitaldia extends Model
{
    protected $table = 'ekitaldiak';

    protected $fillable = [
        'izenburua',
        'deskribapena',
        'data',
        'aretoa',
        'prezioa',
        'edukiera',
        'kategoria_id',
    ];

    public function kategoria(){
        return $this->belongsTo(Kategoria::class);
    }

    public function erosketak(){
        return $this->hasMany(Erosketa::class);
    }
}
