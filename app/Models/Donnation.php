<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donnation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function donnateur(){
        return $this->belongsTo(Donnateur::class);
    }

    public function eleve(){
        return $this->belongsTo(Eleve::class);
    }
}
