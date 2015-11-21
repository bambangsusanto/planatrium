<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestDesignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_designs', function(Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->nullable();
            $table->string('type', 20);
            $table->string('type_other', 20);
            $table->mediumText('type_spec');
            $table->string('size_width', 5);
            $table->string('size_length', 5);
            $table->string('measurement', 10);
            $table->mediumText('type_info');
            $table->string('country');
            $table->mediumText('location_info');
            $table->string('email', 30);
            $table->string('phone', 20);
            $table->boolean('taken');
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
        Schema::drop('request_designs');
    }
}
