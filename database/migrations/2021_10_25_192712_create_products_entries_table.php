<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_entries', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->float('price');



            // $table->foreignId('sub_category_id')->constrained("sub_categories")->cascadeOnDelete();
            $table->foreignId('product_id')->constrained("products")->cascadeOnDelete();
            $table->foreignId('entry_id')->constrained("entries")->cascadeOnDelete();


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
        Schema::dropIfExists('products_entries');
    }
}
