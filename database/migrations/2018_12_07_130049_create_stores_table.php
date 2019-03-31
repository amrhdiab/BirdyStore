<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('contact_email');
            $table->string('contact_number');
            $table->string('website');
            $table->string('governorate');
            $table->string('city');
            $table->string('address');
            $table->string('working_hours');
            $table->float('lat',10,6);
            $table->float('lng',10,6);
            $table->unsignedInteger('location_id');
            $table->string('avatar')->default('store_default.png');
            $table->string('slug');
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
        Schema::dropIfExists('stores');
    }
}
