<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOutputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_outputs', function (Blueprint $table) {
            $table->id();
            $table->integer("quantity")->default(1);
            $table->boolean("destroyed")->default(false);
            $table->string("destroyed_date")->nullable();
            $table->string("custody_id")->nullable();;

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
        Schema::dropIfExists('product_outputs');
    }
}
