<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 60);
            $table->string('middlename', 60)->nullable();
            $table->string('lastname', 60);
            $table->string('phone', 15);
            $table->string('avata', 400)->nullable();
            $table->string('address', 400)->nullable();
            $table->boolean('gender')->default(false);//false -> nam; true -> nữ
            $table->boolean('status')->default(true);//true active

            // 
            $table->string('username', 100)->unique();
            $table->string('email', 100)->unique();
            $table->string('password', 200);
            $table->string('role')->default('customer');
            // 
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
