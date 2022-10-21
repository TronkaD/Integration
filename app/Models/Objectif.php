<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objectif extends Model
{
    use HasFactory;
    protected $guarded = []; # POUR POUVOIR UTILISER TOUS LES CHAMPS DE LA TABLE
}
