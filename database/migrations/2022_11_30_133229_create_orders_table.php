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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id'); //if user is not authenticated, client_id=0
            $table->text('payment_id')->nullable(); //if payment method is cheque
            $table->tinyInteger('status')->default(0); //0-pending, 1-paid, 2-confirmed, 3-sent, 4-shipped, 5-rejected
            $table->decimal('subtotal', 10,2)->default(0); //quantity*prices
            $table->decimal('total', 10,2)->default(0); //subtotal + shipping_price - discount + tax
            $table->date('paid_at')->nullable();
            $table->string('payment_method'); //pod, bank transfer, credit card (optional), paypal (optional)
            $table->decimal('shipping_price', 10,2)->default(0);
            $table->string('shipping_method')->default('delivery'); //delivery, pickup (optional)
            $table->string('coupon')->nullable();
            $table->decimal('discount', 10,2)->default(0);
            $table->string('comment')->nullable();
            $table->string('address');
            $table->string('zip');
            $table->string('city');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('country');
            $table->string('state')->nullable();
            $table->integer('tracing_nr')->nullable();
            $table->text('user_ip_address')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
