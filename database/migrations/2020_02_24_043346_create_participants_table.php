<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function(Blueprint $table) {
            $table->increments('id');
            $table->string('flag')->nullable();
            $table->unsignedInteger('event_id');
            $table->string('full_name');
            $table->string('nick_name');
            $table->text('address');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->string('phone');
            $table->string('email');
            $table->string('instagram');
            $table->string('twitter');
            $table->string('facebook');
            $table->timestamps();
        });

        Schema::create('participant_jobs', function(Blueprint $table) {
            $table->unsignedInteger('participant_id');
            $table->string('agency');
            $table->string('position');
            $table->string('years_of_service');
            $table->timestamps();
        });

        Schema::create('participant_personalities', function(Blueprint $table) {
            $table->unsignedInteger('participant_id');
            $table->string('strength');
            $table->string('weakness');
            $table->string('opportunity');
            $table->string('challenge');
            $table->text('short_story');
            $table->text('hope_in_life');
            $table->text('hope_in_training');
            $table->timestamps();
        });

        Schema::create('participant_attendances', function(Blueprint $table) {
            $table->unsignedInteger('participant_id');
            $table->unsignedInteger('event_id');
            $table->char('status', 1); // 1 : Pagi , 2 : Siang
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
        Schema::dropIfExists('participant_personalities');
        Schema::dropIfExists('participant_jobs');
        Schema::dropIfExists('participants');
    }
}
