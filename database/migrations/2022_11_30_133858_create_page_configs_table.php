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
        Schema::create('page_configs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->string('company_name');
            $table->string('logo')->nullable();
            $table->string('address')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->tinyInteger('hotline_support')->default(0);
            $table->string('hotline_num')->nullable()->default(null);
            $table->decimal('shipping_fee', 10,2)->default(0);
            $table->decimal('min_order_free', 10,2)->default(0);
            $table->decimal('processing_fee', 10,2)->default(0);
            $table->string('currency')->default('€');
            $table->tinyInteger('cash_payment')->default(1);
            $table->tinyInteger('shipping_type')->default(2);
            $table->string('about')->nullable()->default(null);
            $table->string('privacy_policy')->nullable()->default(null);
            $table->string('terms_conditions')->nullable()->default(null);
            $table->string('facebook')->nullable()->default(null);
            $table->string('whatsapp')->nullable()->default(null);
            $table->string('instagram')->nullable()->default(null);
            $table->mediumText('shop_information')->nullable();
            $table->longText('shipping_json')->nullable();
            $table->tinyInteger('template')->default(1);
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
        Schema::dropIfExists('page_configs');
    }
};
