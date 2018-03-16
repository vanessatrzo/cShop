<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('picture')->default('default.png');
            $table->string('code');
            $table->string('barcode')->default('default.png');
            $table->string('name');
            $table->text('description');
            $table->text('category')->nullable();
            $table->string('quantity')->default('1');
            $table->double('price')->nullable();
            $table->double('subtotal')->nullable();
            $table->string('status')->default('Disponible');
            $table->string('ubication')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
