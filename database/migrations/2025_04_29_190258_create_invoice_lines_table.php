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
        Schema::create('invoice_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained('invoices')->onDelete('cascade'); // Cascade delete lines if invoice is deleted
            $table->foreignId('product_id')->constrained('products')->onDelete('restrict'); // Don't delete product if it's on an invoice line
            $table->string('product_name'); // Store name at time of invoice
            $table->integer('quantity');
            $table->decimal('unit_price', 10, 2); // Store price at time of invoice
            $table->decimal('line_total', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_lines');
    }
};
