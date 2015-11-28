<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerOrderTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->bigIncrements('customer_id');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->timestamp('customer_created_at');
            $table->timestamp('customer_updated_at');
        });

        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            $table->integer('customer_id');
            $table->boolean('order_shipped');
            $table->timestamp('order_created_at');
            $table->timestamp('order_updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order');
        Schema::drop('customer');
    }
}
