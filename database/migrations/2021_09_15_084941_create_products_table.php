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
            $table->string('name') ;
            $table->text('description')  ;
            $table->bigInteger('category_id') ;
            $table->bigInteger('count_like')->default(0);
            $table->double('price') ;
            $table->string('address') ;
            $table->boolean('status_sell')->default(0);
            $table->bigInteger('user_id') ;
            $table->integer('city_id') ;
            $table->boolean('accept')->default(0);
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
