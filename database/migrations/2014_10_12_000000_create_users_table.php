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
            $table->string('name');
            $table->string('avatar_url');
            $table->string('phone')->unique();
            $table->string('email');
            $table->integer('gender_id')->nullable();
            $table->string('password');
            $table->string('date_of_birth')->nullable();
            $table->string('address')->nullable();
            $table->boolean('status_of_account')->default(1);
            $table->float('account_balance')->default(0)->nullable();
            $table->boolean('role')->default(0)->nullable();
            $table->rememberToken();
            $table->timestamps();
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
