<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pro_id')->unsigned()->nullable();
            $table->foreign('pro_id')->references('id')->on('products')->onDelete('cascade');
            $table->integer('priceSmall');
            $table->integer('priceMedium');
            $table->integer('priceLarge');
            $table->integer('priceXl');
            $table->integer('priceXxl');
            $table->integer('priceOther');
            $table->integer('status');
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
        Schema::dropIfExists('prices');
    }
}
