<?php

use ALP\PurchaseOrder\PurchaseOrderStatus;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id')->unsigned();
            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->integer('user_id')->unsigned();
            $table->decimal('amount', 15, 2);
            $table->decimal('gst_amount', 10, 2);
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('status', [
                PurchaseOrderStatus::PENDING,
                PurchaseOrderStatus::APPROVED,
                PurchaseOrderStatus::VOIDED,
                PurchaseOrderStatus::DECLINED,
            ]);
            $table->boolean('is_upcoming')->default(false);
            $table->integer('budget_category_id')->unsigned()->nullable();
            $table->foreign('budget_category_id')->references('id')->on('budget_categories');
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
        Schema::drop('purchase_orders');
    }
}
