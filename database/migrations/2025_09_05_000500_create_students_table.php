<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // الرقم التعريفي للطالب
            $table->string('name'); // اسم الطالب
            $table->string('email')->unique()->nullable(); // البريد الإلكتروني (اختياري)
            $table->string('phone')->nullable(); // رقم الهاتف
            $table->foreignId('guardian_id')->constrained('guardians')->onDelete('cascade'); // ولي الأمر
            $table->foreignId('school_id')->constrained('schools')->onDelete('cascade'); // المدرسة
            $table->foreignId('bus_id')->nullable()->constrained('buses')->onDelete('set null'); // الباص (اختياري)
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('students');
    }
};
