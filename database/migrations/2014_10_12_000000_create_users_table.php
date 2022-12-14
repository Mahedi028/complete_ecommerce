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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 128);
            $table->string('email', 128)->unique();
            $table->string('phone_number', 32)->nullable();
            $table->string('password');
            $table->bigInteger('reward_points')->default(0);
            $table->tinyInteger('email_verified')->default(0);
            $table->string('email_verification_token', 100)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('facebook_id', 80)->nullable();
            $table->string('google_id', 80)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
