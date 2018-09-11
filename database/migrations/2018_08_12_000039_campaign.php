<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Campaign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_campaign', function (Blueprint $table) {
            $table->increments('id');
			
			$table->integer('product_id')->unsigned()->nullable();
			$table->foreign('product_id')->references('id')->on('product');
			$table->datetime('expiry_at');
			
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
        Schema::dropIfExists('campaign');
    }
}