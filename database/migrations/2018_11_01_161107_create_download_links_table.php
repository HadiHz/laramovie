<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDownloadLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('download_links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('quality_name');
            $table->string('link' , 255);
            $table->string('screenshot_link',255);
            $table->integer('downloadable_id');
            $table->string('downloadable_type',64);
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
        Schema::dropIfExists('download_links');
    }
}
