<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('spsn_log_kafka_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('spsn_app_service_id')->references('id')->on('spsn_app_services')->cascadeOnDelete()->cascadeOnUpdate();
            $table->json('message_body')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('kafka_messages');
    }
};