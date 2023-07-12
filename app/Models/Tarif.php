<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;
    public function dureeLocation(){
        return $this->belongTo(DureeLocation::class,"duree_location_id","id");
    }
    public function voitures(){
        return $this->belongTo(Voiture::class,"voiture_id","id");
    }
}
