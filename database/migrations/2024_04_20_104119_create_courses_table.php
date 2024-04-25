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
        Schema::create('courses', function (Blueprint $table) {
            $table->id(); // membuat kolom id
            $table->string('name'); // membuat kolom dengan nama 'name' dan tipe data varchar
            $table->string('code')->unique(); // membuat kolom dengan nama 'code', tipe data varchar, dan index unique
            $table->integer('credit'); // membuat kolom dengan nama 'credit' dan tipe data int
            $table->foreignId('department_id')->constrained(); // membuat kolom dengan nama 'department_id', tipe data bigint, dan foreign key ke tabel departemen dengan kolom dengan nama id
            $table->timestamps(); // membuat kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
