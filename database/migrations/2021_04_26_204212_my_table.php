<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('order_id')->unsigned()->nullable();
            $table->integer('pro_id')->unsigned()->nullable();
        
           
            $table->foreign('order_id')->references('id')->on('new_orders');
            $table->foreign('pro_id')->references('id')->on('products');
          
            $table->unsignedInteger('quantity');
            $table->decimal('price', 20, 6);

            
          

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
}
