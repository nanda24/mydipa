<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dipa_dynamic_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('table_id')->constrained('dipa_table')->onDelete('cascade');
            $table->string('field_label');
            $table->string('field_name');
            $table->string('data_type');
            $table->boolean('is_required')->default(false);
            $table->integer('order_index')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dipa_dynamic_fields');
    }
};
