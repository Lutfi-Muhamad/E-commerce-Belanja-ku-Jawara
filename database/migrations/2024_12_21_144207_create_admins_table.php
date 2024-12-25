<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel admins.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id(); // Kolom id otomatis
            $table->string('name'); // Nama admin
            $table->string('email')->unique(); // Email admin yang unik
            $table->string('password'); // Password admin
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Balikkan perubahan migrasi (drop tabel admins).
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
