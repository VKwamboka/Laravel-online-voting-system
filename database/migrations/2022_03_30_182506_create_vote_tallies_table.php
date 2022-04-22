<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_tallies', function (Blueprint $table) {
            $table->id();
            // $table->string('vote_tallies');
            $table->string('position');
            $table->text('voter_id');
            $table->integer('candidate_id');

            $table->integer('election_id');
           
            


            
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
        Schema::dropIfExists('vote_tallies');
    }
};
