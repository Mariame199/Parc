<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    public function user(){

        return $this->belongsTo(User::class);

             }
             public function client(){

                return $this->belongsTo(Client::class);

                     }
             public function statut(){

                  return $this->belongsTo(StatutLocation::class,"statut_location_id");

                             }
                             public function paiement(){

                                return $this->hasMany(Paiements::class);

                                     }
                                     public function voitures(){

                                        return $this->belongToMany(Voiture::class,"voiture_location","location_id","voiture_id");

                                             }
}

