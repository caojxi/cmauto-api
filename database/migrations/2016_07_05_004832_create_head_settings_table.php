<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeadSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('head_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->date('campaign_start_date')->nullable();
            $table->date('campaign_end_date')->nullable();
            $table->date('donation_disclosure_start_date')->nullable();
            $table->date('donation_disclosure_end_date')->nullable();
            $table->decimal('donation_threshold_amount', 15, 2)->nullable();
            $table->string('email_frequency')->nullable();
            $table->string('stat_email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('head_settings');
    }
}
