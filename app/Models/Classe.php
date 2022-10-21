<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model{
    use HasFactory;
    protected $guarded = []; # POUR POUVOIR UTILISER TOUS LES CHAMPS DE LA TABLE

    public function eleves(){
        return $this->hasMany(Eleve::class);
    }
}
