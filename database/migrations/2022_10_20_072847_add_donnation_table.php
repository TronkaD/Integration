<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDonnationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donnations', function (Blueprint $table) {
            //
            $table->id();
            $table->foreignId('donnateur_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('eleve_id')->nullable()->default(null)->constrained()->onDelete('set null');
            $table->float('montant');
            $table->string('method',155)->default('Carte');
            $table->text('message')->default(null)->nullable();
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
        Schema::table('donnations', function (Blueprint $table) {
            //
        });
    }
}
