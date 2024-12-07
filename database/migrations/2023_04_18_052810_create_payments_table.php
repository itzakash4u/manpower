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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->decimal('convinient_charge', 10,2);
            $table->enum('discount_type', ['flat', 'percent']);
            $table->biginteger('discount');
            $table->integer('lv1_duration')->nullable();
            $table->decimal('lv1_customer_pay', 10,2)->nullable();
            $table->decimal('lv1_employee_pay', 10,2)->nullable();
            $table->integer('lv2_duration')->nullable();
            $table->decimal('lv2_customer_pay', 10,2)->nullable();
            $table->decimal('lv2_employee_pay', 10,2)->nullable();
            $table->integer('waiting_time')->nullable();
            $table->decimal('waiting_time_charge', 10,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
