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
        Schema::create('phonepe', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('amount');
            $table->string('trans_id');
            $table->string('m_trns_id');
            $table->string('status');
            $table->dateTime('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phonepe');
    }
};
