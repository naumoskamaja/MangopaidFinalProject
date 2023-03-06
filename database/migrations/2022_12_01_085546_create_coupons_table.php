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
        Schema::create('coupons', function (Blueprint $table) {
                $table->increments('id');
                $table->string('code');
                $table->tinyInteger('type')->default(0);
                $table->decimal('value', 10,2)->default(0);
                $table->date('start_date');
                $table->date('end_date');
                $table->integer('nr')->default(0);
                $table->string('image')->nullable();
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
        Schema::dropIfExists('coupons');
    }
};
