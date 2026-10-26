<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Erosketa extends Model
{
    protected $table = 'erosketak';
    
    protected $fillable = [
        'ekitaldia_id',
        'erabiltzailea_id',
        'kantitatea',
        'guztira',
    ];


    public function ekitaldia(){
        return $this->belongsTo(Ekitaldia::class);
    }

    public function erabiltzailea(){
        return $this->belongsTo(User::class);
    }
}
