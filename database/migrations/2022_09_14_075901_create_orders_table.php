<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('customer_name', 128);
            $table->string('customer_email', 128);
            $table->string('customer_phone_number', 32);
            $table->text('address');
            $table->string('city', 32);
            $table->string('postal_code', 16);
            $table->decimal('total_amount', 10, 2);
            $table->decimal('discount_amount', 10, 2)->default(0.00);
            $table->string('payment_status', 16);
            $table->text('payment_details', 16)->nullable();
            $table->string('operational_status', 16)->default('pending');
            $table->unsignedInteger('processed_by')->nullable();
            $table->timestamps();
            // $table->dropForeign('user_id');
            // $table->foreign('user_id')->constrained('users')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('orders', function (Blueprint $table) {
        //     $table->dropForeign(['user_id']);
        // });
        Schema::dropIfExists('users');
        Schema::dropIfExists('orders');
    }
};
