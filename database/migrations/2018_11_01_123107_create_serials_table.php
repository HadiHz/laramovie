<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSerialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->double('rate');
            $table->text('summary');
            $table->string('header_title',255);
            $table->string('subheader_title',255);
            $table->integer('number_of_seasons');
            $table->dateTime('release_date');
            $table->string('image',255);
            $table->string('meta_keywords',250);
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
        Schema::dropIfExists('serials');
    }
}
