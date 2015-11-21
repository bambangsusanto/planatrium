<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function(Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('title');
            $table->integer('user_id');
            $table->boolean('favorite');
            $table->string('image');
            $table->string('location');
            $table->string('size_width', 5);
            $table->string('size_length', 5);
            $table->string('measurement', 10);
            $table->string('status');
            $table->text('story');
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
        Schema::drop('projects');
    }
}
