<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePrices extends Migration
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
            $table->integer('purchaseSmall');
            $table->integer('purchaseMedium');
            $table->integer('purchaseLarge');
            $table->integer('purchaseXl');
            $table->integer('purchaseXxl');
            $table->integer('purchaseOther');
            // min price
            $table->integer('minSmall');
            $table->integer('minMedium');
            $table->integer('minLarge');
            $table->integer('minXl');
            $table->integer('minXxl');
            $table->integer('minOther');
            // max price
            $table->integer('maxSmall');
            $table->integer('maxMedium');
            $table->integer('maxLarge');
            $table->integer('maxXl');
            $table->integer('maxXxl');
            $table->integer('maxOther');

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
