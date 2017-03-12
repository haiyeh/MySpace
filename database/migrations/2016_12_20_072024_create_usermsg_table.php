<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsermsgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usermsgs', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('user_id');
            $table->string('username');
            $table->string('phonenumber', 13)->unique();
            $table->string('address', 15);
            $table->string('hobby', 40);
            $table->tinyInteger('sex');
            $table->tinyInteger('livestatus');
            $table->smallInteger('head_id');
            $table->string('desc',100);
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
