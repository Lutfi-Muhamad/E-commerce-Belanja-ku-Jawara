<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTb extends Migration
{
    public function up()
    {
        Schema::create('product_tb', function (Blueprint $table) {
            $table->id();
            $table->string('name_product');
            $table->string('merk_product');
            $table->decimal('product_price', 10, 2);
            $table->text('product_description');
            $table->json('product_photo')->nullable(); // Menyimpan lebih dari 1 foto dalam format JSON
            $table->integer('product_stock');
            $table->timestamps(); // created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_tb');
    }
}
