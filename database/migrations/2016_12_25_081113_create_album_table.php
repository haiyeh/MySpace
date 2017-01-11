<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function(Blueprint $table){
            $table->increments('id');
            $table->string('album_name', 20);
            $table->tinyInteger('status');
            $table->smallInteger('type');
            $table->string('desc', 200);
            $table->integer('praises');
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
        //
    }
}
