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
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Supprimer les conversations si l'utilisateur client est supprimé
            $table->string('subject')->nullable();
            $table->enum('status', ['open', 'closed', 'pending_admin', 'pending_client'])->default('open');
            $table->timestamp('last_reply_at')->nullable();
            $table->timestamps();

            $table->index('status');
            $table->index('last_reply_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversations');
    }
};
