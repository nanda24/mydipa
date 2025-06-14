<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dipa_menu', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['master', 'transaction', 'report']);
            $table->string('url');
            $table->string('icon')->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('dipa_menu')->onDelete('cascade');
            $table->boolean('is_active')->default(true);
            $table->integer('order_index')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dipa_menu');
    }
};
