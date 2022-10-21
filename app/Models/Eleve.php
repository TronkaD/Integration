<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function classe(){
        return $this->belongsTo(Classe::class);
    }

    public function donnateurs(){
        return $this->belongsToMany(Donnateur::class);
    }
}
