<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('package_confirmations', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique()->nullable();
            $table->foreignId('package_id')->constrained()->onDelete('cascade');
            $table->string('user_name');
            $table->string('user_phone');
            $table->string('user_email');
            $table->text('user_message')->nullable();
            $table->string('nid_passport')->nullable();
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
            $table->string('user_type')->default('user');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_confirmations');
    }
};
