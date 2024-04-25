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
        Schema::create('course_user', function (Blueprint $table) {
            $table->foreignId('course_id')->constrained(); // membuat kolom dengan nama 'course_id', tipe data bigint, dan foreign key ke tabel course dengan kolom dengan nama id
            $table->foreignId('user_id')->constrained(); // membuat kolom dengan nama 'user_id', tipe data bigint, dan foreign key ke tabel user dengan kolom dengan nama id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_user');
    }
};
