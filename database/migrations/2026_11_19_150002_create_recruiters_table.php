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
        Schema::create('recruiters', function (Blueprint $table) {
            $table->id();
            // Owner of this recruiter record
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // Optional company; if permanently deleted, recruiter remains with NULL company_id
            $table->foreignId('company_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name', 100);
            $table->string('email', 150);
            $table->string('phone', 10)->nullable();
            $table->string('designation', 100)->nullable();
            $table->string('linkedin_url', 255)->nullable();
            $table->string('city', 100)->nullable();
            $table->enum('source', ['LinkedIn', 'Placement Cell', 'Referral', 'Job Fair', 'Other']);
            $table->enum('status', ['New', 'Active', 'Cold'])->default('New');
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('recruiters');
    }
};