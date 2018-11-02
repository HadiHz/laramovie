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
            $table->integer('actor_id');
            $table->integer('producible_id');
            $table->string('producible_type' , 64);
            $table->primary(['actor_id' , 'producible_id' ,'producible_type'] ,'primary_key');
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
