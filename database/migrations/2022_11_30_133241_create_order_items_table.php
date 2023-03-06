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
        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_id');
            $table->integer('product_id');
            $table->integer('qty')->default(1);
            $table->float('price', 10, 2);
            $table->decimal('old_price', 10,2)->default(0);
            $table->decimal('discount', 10,2)->default(0);
            $table->float('total', 10, 2); //price * qty
            $table->text('attributes')->nullable();
            $table->string('size')->nullable(); //if product has sizes
            $table->string('color')->nullable(); //if product has colors
            $table->text('image')->nullable(); //if product has colors - color image, otherwise product main image
            $table->string('sku');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('order_items');
    }
};
