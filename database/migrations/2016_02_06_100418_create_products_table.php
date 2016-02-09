<?php

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
            $table->float('price');
            $table->integer('year');
            $table->string('name');
            $table->string('author');
            $table->string('image');
            $table->longText('description');
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->integer('product_type_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
