<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->enum('age', ['18-25', '26-33', '34-40', '40+']);
            $table->enum('gender', ['male', 'female']);
            $table->string('social_network');
            $table->bigInteger('facebook_time');
            $table->bigInteger('whatsapp_time');
            $table->bigInteger('twitter_time');
            $table->bigInteger('instagram_time');
            $table->bigInteger('tiktok_time');
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
        Schema::dropIfExists('questionnaires');
    }
}
