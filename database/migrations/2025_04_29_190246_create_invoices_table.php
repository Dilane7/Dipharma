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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique();
            $table->date('invoice_date');
            $table->date('due_date')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null'); // Link to customer user, nullable for walk-ins
            $table->foreignId('order_id')->nullable()->unique()->constrained('orders')->onDelete('set null'); // Link to originating order, nullable and unique
            $table->string('customer_name'); // Can be User's name or manually entered name
            $table->string('customer_phone')->nullable();
            $table->text('customer_address')->nullable();
            $table->decimal('sub_total', 10, 2)->default(0.00);
            $table->decimal('tax', 10, 2)->default(0.00); // Optional tax
            $table->decimal('total_amount', 10, 2)->default(0.00);
            $table->enum('status', ['draft', 'unpaid', 'paid', 'cancelled'])->default('unpaid');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
