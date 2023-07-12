<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelVoiture extends Model
{
    use HasFactory;
    public function voitures(){
        return $this->belongTo(Voiture::class,"voiture_id","id");
    }
}
