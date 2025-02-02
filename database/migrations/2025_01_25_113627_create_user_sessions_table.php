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
        Schema::create('user_sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->restrictOnDelete();
            $table->string('session_token')->unique(); // Unique session token
            $table->timestamp('login_time')->nullable(); // Login time
            $table->timestamp('logout_time')->nullable(); // Logout time
            $table->ipAddress('ip_address')->nullable(); // IP address of the user
            $table->string('user_agent')->nullable(); // User agent string (browser, OS, etc.)
            $table->text('extra_data')->nullable(); // Any additional information (optional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_sessions');
    }
};
