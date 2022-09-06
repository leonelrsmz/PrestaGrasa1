<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('status'); //Si el valor de ese parámetro es 0, entonces es borrador, sino sería producto final
            $table->string('name');
            $table->string('slug');
            $table->integer('category_id');
            $table->string('image');
            $table->decimal('price',11,2); //Numero de digitos decimales "2" y 11 (enteros)
            $table->integer('in_discount');
            $table->integer('discount');
            $table->text('content');
            // $table->softDeletes();
            $table->timestamps();
            $table->string('brand');
            $table->string('artist');
            $table->decimal('size',11,1);

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
