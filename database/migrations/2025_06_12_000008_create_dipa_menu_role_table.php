<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dipa_menu_role', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained('dipa_menu')->onDelete('cascade');
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dipa_menu_role');
    }
};
