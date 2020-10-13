<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('prod_name');
            $table->text('prod_description');
            $table->double('prod_old_price')->default(99);
            $table->double('prod_new_price');
            $table->text('prod_image')->default('product_default.jpg');
            $table->unsignedBigInteger('cat_id');
            $table->string('prod_status')->nullable();
            $table->string('country_made')->nullable();
            $table->smallInteger('availability')->default(1);
            $table->unsignedBigInteger('prod_related')->nullable();
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('prod_related')->references('id')->on('related')->onDelete('cascade')->onUpdate('cascade');
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
