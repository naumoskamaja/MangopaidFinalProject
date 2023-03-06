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
        Schema::create('convert_currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('mkd', 10, 4)->default(0);
            $table->decimal('eur', 10, 4)->default(0);
            $table->decimal('lek', 10, 4)->default(0);
            $table->decimal('usd', 10, 4)->default(0);
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('convert_currencies');
    }
};
