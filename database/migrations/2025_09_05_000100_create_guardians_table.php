<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم ولي الأمر
            $table->string('email')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('guardians');
    }
};
