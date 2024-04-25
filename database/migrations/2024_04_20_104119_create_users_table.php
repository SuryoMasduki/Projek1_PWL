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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // membuat kolom id
            $table->string('name'); // membuat kolom dengan nama 'name' dan tipe data varchar
            $table->string('nim')->default(" "); // membuat kolom dengan nama 'name', tipe data varchar, dan nilai default " "
            $table->string('email')->unique(); // membuat kolom dengan nama 'code', tipe data varchar, dan index unique
            $table->timestamp('email_verified_at')->nullable(); // membuat kolom email_verified_at, tipe data timestamp, dan dapat diisi data dengan null
            $table->string('password'); // membuat kolom dengan nama 'password' dan tipe data varchar
            $table->foreignId('department_id')->default(1)->constrained(); // membuat kolom dengan nama 'department_id', default data 1, tipe data bigint, dan foreign key ke tabel departemen dengan kolom dengan nama id
            $table->rememberToken(); // membuat kolom dengan nama 'remember_token' dan tipe data varchar 100
            $table->timestamps(); // membuat kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
