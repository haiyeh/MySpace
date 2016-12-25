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
            $table->string('name', 20);
            $table->string('email', 50)->unique();
            $table->string('headerpath');
            $table->string('phone', 13);
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
