<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('bus_routes', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم خط السير
            $table->string('start_point'); // نقطة البداية
            $table->string('end_point');   // نقطة النهاية
            $table->text('stops')->nullable(); // محطات التوقف (يمكن تخزين JSON)
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('bus_routes');
    }
};
