<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActorProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('actor_id');
            $table->integer('producible_id');
            $table->integer('producible_type');
            $table->primary(['actor_id' , 'producible_id' ,'producible_type'] ,'primary_key');
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
        Schema::dropIfExists('actor_products');
    }
}
