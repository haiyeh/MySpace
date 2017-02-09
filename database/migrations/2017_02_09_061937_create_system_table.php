<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systems', function (Blueprint $table){
            $table->increments('id');
            $table->tinyInteger('diary');
            $table->tinyInteger('say');
            $table->tinyInteger('message');
            $table->tinyInteger('album');
            $table->tinyInteger('comment');
            $table->tinyInteger('parise');
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
