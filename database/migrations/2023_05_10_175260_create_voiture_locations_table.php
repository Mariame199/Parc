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
        Schema::create('voiture_locations', function (Blueprint $table) {
            $table->foreignId('voiture_id')->constrained();
            $table->foreignId('location_id')->constrained();
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('voiture_locations',function(Blueprint $table){
            $table->dropForeign(["voiture_id","location_id"]);
        });
        Schema::dropIfExists('voiture_locations');
    }
};
