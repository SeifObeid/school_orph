<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsOutputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_outputs', function (Blueprint $table) {
            $table->id();
            $table->integer("quantity");

            $table->foreignId('output_id')->constrained("outputs")->cascadeOnDelete();
            $table->foreignId('product_id')->constrained("products")->cascadeOnDelete();


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
        Schema::dropIfExists('products_outputs');
    }
}
