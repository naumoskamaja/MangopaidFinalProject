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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->longText('description')->nullable();
            $table->string('code');
            $table->decimal('stock', 10, 2)->default(0);
            $table->string('productKey')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->decimal('price', 10,2)->default(0);
            $table->integer('tax')->default(0);
            $table->tinyInteger('isNew')->default(0);
            $table->tinyInteger('onSale')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->text('expert_tips')->nullable();
            $table->text('short_description')->nullable();
            $table->string('description_image')->nullable();
            $table->text('more_info')->nullable();
            $table->tinyInteger('isBestseller')->default(0);
            $table->bigInteger('count_ordered')->default(0);
            $table->longText('filters')->nullable();
            $table->string('color')->nullable();
            $table->string('color_code')->default('#000000');
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
};
