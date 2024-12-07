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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('aadhar_no', 50);
            $table->enum('user_type', ['admin', 'employer', 'employee']);
            $table->text('address');
            $table->string('state', 100);
            $table->string('country', 100);
            $table->decimal('lat', 10,7);
            $table->decimal('lng', 10,7);
            $table->string('profile_image');
            $table->string('aadhar_image');
            $table->string('ac_holder_name', 200);
            $table->string('ac_number', 100);
            $table->string('ifsc', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
