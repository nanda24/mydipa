<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dipa_table', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained('dipa_menu')->onDelete('cascade');
            $table->string('table_name');
            $table->text('table_description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dipa_table');
    }
};
