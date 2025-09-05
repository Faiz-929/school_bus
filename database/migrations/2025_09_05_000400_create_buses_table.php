<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->string('plate_number')->unique(); // رقم اللوحة
            $table->integer('capacity'); // السعة (عدد الطلاب)
            $table->foreignId('driver_id')->nullable()->constrained('drivers')->onDelete('set null'); // السائق
            $table->foreignId('bus_route_id')->nullable()->constrained('bus_routes')->onDelete('set null'); // خط السير
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('buses');
    }
};
