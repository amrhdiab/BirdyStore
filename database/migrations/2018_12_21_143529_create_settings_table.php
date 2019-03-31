<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('website_name');
            $table->string('contact_number');
            $table->string('contact_email_1');
            $table->string('contact_email_2');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('google');
            $table->string('dribble');
            $table->string('slogan');
            $table->string('address');
            $table->float('lat',10,6);
            $table->float('lng',10,6);
            $table->text('about_us');
            $table->string('logo');
            $table->string('logo2');
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
        Schema::dropIfExists('settings');
    }
}
