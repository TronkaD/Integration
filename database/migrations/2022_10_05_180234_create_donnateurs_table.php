<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonnateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donnateurs', function (Blueprint $table) {
            $table->id();
            $table->string("nom", 50);
            $table->string("prenom", 150);
            $table->string("email", 255);
            $table->string("tel", 15);
            $table->string("status", 80);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donnateurs');
    }
}
