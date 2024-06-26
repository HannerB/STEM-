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
            $table->string('username')->unique();
            $table->string('url')->nullable();
            $table->boolean('state')->default(1);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->string('password');
            $table->text('note')->nullable(); // Campo de nota
            $table->string('position', 255)->nullable();
            $table->string('area')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('college')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
            $table->dropColumn('area');
            $table->dropColumn('phone_number');
            $table->dropColumn('twitter_link');
            $table->dropColumn('facebook_link');
            $table->dropColumn('linkedin_link');
            $table->dropColumn('college');
        });
    }
};
