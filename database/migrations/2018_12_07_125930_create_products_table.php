<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->unsignedInteger('price');
            $table->string('featured_image')->default('product-default.png');
            $table->string('images')->default('product-default.png|product-default.png|product-default.png');
            $table->boolean('is_featured')->default(0);
            $table->boolean('has_offer')->default(0);
            $table->unsignedInteger('discount')->nullable()->default(null);
            $table->unsignedInteger('new_price')->nullable()->default(null);
            $table->unsignedInteger('stock');
            $table->unsignedInteger('sales')->nullable()->default(null);
            $table->unsignedInteger('admin_id')->default(1);
            $table->unsignedInteger('sub_cat_id');
            $table->unsignedInteger('brand_id');
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
        Schema::dropIfExists('products');
    }
}
