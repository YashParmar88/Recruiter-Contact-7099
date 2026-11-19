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
        Schema::create('interactions', function (Blueprint $table) {
            $table->id();
            // Owner of this interaction record
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // Linked recruiter
            $table->foreignId('recruiter_id')->constrained()->cascadeOnDelete();
            $table->enum('type', ['Call', 'Email', 'Message', 'Meeting', 'Interview']);
            $table->date('interaction_date');
            $table->text('summary');
            $table->boolean('got_reply')->default(false);
            $table->timestamps();
            // Enables Trash & Restore functionality
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interactions');
    }
};