<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('township_id');
            $table->date('receive_date');
            $table->time('receive_time');
            $table->string('address');
            $table->unsignedBigInteger('user_id');
            $table->string('status')->default('pending');
            $table->timestamps();

            $table->foreign('township_id')
                ->references('id')->on('townships')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
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
}
