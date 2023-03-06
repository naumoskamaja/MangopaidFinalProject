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
        Schema::create('action_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->decimal('old_price', 10,2)->default(0);
            $table->decimal('new_price', 10,2)->default(0);
            $table->decimal('discount', 10,2)->default(0);
            $table->date('valid_till');
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('action_products');
    }
};
