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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transactions_id')->constrained('transactions')->onDelete('cascade');
            $table->string('ticket_number')->unique();
            $table->string('ticket_code')->unique();
            $table->boolean('is_active')->default(true);
            $table->string('tag')->nullable();
            $table->string('type')->default('regular');
            $table->unsignedInteger('max_uses')->nullable();
            $table->unsignedInteger('usage_count')->default(0);
            $table->timestamp('valid_from')->nullable();
            $table->timestamp('valid_until')->nullable();
            $table->string('status')->default('not validated');
            $table->string('sponsor')->nullable();
            $table->decimal('original_total', 12, 2)->default(0);
            $table->decimal('final_total', 12, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
