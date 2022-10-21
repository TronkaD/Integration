<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;

class Donnateur extends Model
{
    use HasFactory;
    use Billable;
    protected $guarded = []; # POUR POUVOIR UTILISER TOUS LES CHAMPS DE LA TABLE
    public function eleves(){
        return $this->belongsToMany(Eleve::class);
    }
}
