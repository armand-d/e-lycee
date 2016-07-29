<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQcmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qcms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title', 100);
            $table->enum('level', ['first_class', 'final_class']);
            $table->integer('nbr_choice');
            $table->integer('nbr_question');
            $table->integer('status');
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
        Schema::drop('qcms');
    }
}
