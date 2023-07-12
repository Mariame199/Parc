<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->string('marque');
            $table->string('couleur');
            $table->string('matricule');
            $table->string('description');
            $table->string('imageUrl');
            $table->boolean("estDisponible")->default(1);
            //  $table->foreignId("model_voiture_id")->constrained();
            $table->foreignId("type_voiture_id")->constrained();
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('voitures',function(Blueprint $table){
            $table->dropForeign([ "type_voiture_id"]);
        Schema::dropIfExists('voitures');
    });
        Schema::dropIfExists('voitures');
    }
};
