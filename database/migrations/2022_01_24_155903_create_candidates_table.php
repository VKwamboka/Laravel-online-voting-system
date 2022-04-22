<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
                    $table->bigIncrements('id');
                    $table->string('regNo');
                    $table->string('firstName');
                    $table->string('secondName');
                    $table->string('email');
                    $table->string('faculty');
                    $table->string('position');
                    $table->text('Manifesto');
                    $table->string('photo'); 

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
        Schema::dropIfExists('candidates');
    }
}
