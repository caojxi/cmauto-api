<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->double('total', 7, 2);
            $table->double('gst', 7, 2);
            $table->text('notes');
            $table->string('plate', 15);
            $table->string('vin_no', 50);
            $table->string('odo', 50);
            $table->string('make', 25);
            $table->string('model', 25);
            $table->string('year', 10);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('services');
    }
}
