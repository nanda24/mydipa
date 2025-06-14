<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dipa_users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('full_name');
            $table->foreignId('dipa_company_id')->constrained('dipa_companies');
            $table->boolean('is_active')->default(true);
            $table->rememberToken(); // adds nullable string 'remember_token'
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dipa_users');
    }
};
