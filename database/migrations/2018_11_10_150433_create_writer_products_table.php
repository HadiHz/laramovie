<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWriterProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('writer_products', function (Blueprint $table) {
            $table->integer('writer_id');
            $table->integer('producible_id');
            $table->string('producible_type' , 64);
            $table->primary(['writer_id' , 'producible_id' ,'producible_type'] ,'primary_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('writer_products');
    }
}
