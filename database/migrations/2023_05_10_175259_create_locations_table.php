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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->datetime("dateDebut");
            $table->datetime("dateFin");
            $table->foreignId('client_id')->constrained();
            $table->foreignId('user_id')->constrained();

        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('locations',function(Blueprint $table){
            $table->dropForeign(["client_id","user_id"]);
        Schema::dropIfExists('locations');
    });
}
 };
