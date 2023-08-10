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
            $table->integer('categorie_id')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('image');
            $table->decimal('price', 15, 2);
            $table->string('description');
            $table->integer('deleted_at');
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
