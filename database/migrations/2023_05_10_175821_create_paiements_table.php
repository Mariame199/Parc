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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->double("montantPayer");
            $table->string("modePaiement");
            $table->datetime("datePaiement");
            $table->foreignId('user_id')->constrained();
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
        Schema::table('paiements',function(Blueprint $table){
            $table->dropForeign(["location_id","user_id"]);
        });
        Schema::dropIfExists('paiements');

    }
};
