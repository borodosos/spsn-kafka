<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('spsn_log_kafka_outgoing_messages', function (Blueprint $table) {
            $table->id();
            $table->string('to_app_service')->nullable();
            $table->string('status');
            $table->string('message_id')->nullable();
            $table->json('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('log_kafka_outgoing_messages');
    }
};