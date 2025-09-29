<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();          // Judul footer
            $table->text('description')->nullable();      // Deskripsi singkat
            $table->string('address')->nullable();        // Alamat
            $table->string('phone')->nullable();          // Nomor telp
            $table->string('email')->nullable();          // Email
            $table->string('open_hours')->nullable();     // Jam operasional
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('footers');
    }
};
