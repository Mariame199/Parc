<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;

    public function type(){

       return $this->belongsToMany(TypeVoiture::class, "type_voitures_id","id");

            }
            public function tarifs(){

                return $this->hasMany(Tarif::class,);

                     }
                     public function locations(){

                        return $this->belongToMany(Location::class,"voiture_location","voiture_id","location_id");

                             }
                             //  public function modele(){

                                // return $this->belongsToMany(ModelVoiture::class,"model_voiture_id","id");

                                // }
        }
