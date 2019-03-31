<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('headline')->nullable()->default(null);
            $table->string('title')->nullable()->default(null);
            $table->string('sub_title')->nullable()->default(null);
            $table->string('action1_title')->nullable()->default(null);
            $table->string('action2_title')->nullable()->default(null);
            $table->string('action1_link')->nullable()->default(null);
            $table->string('action2_link')->nullable()->default(null);
            $table->string('bg_media')->nullable()->default(null);
            $table->string('image1')->nullable()->default(null);
            $table->string('image2')->nullable()->default(null);
            $table->string('image3')->nullable()->default(null);
            $table->string('image1_link')->nullable()->default(null);
            $table->string('image2_link')->nullable()->default(null);
            $table->string('image3_link')->nullable()->default(null);
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
        Schema::dropIfExists('sliders');
    }
}
