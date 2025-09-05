<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('name');       // اسم السائق
            $table->string('phone')->unique(); // رقم الهاتف
            $table->string('phone_home')->unllable(); //  2 رقم الهاتف
            $table->string('license_number')->nullable(); // رقم الرخصة
            $table->string('email')->unique()->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('drivers');
    }
};
