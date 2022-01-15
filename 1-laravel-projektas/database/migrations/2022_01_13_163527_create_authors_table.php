<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ //SUKURIA DUOMENŲ BAZĘ
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            //SUKURIA DB STULPELIUS
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('description');
            $table->string('phone');
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
        Schema::dropIfExists('authors');
    }
}
