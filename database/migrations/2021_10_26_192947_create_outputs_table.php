<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outputs', function (Blueprint $table) {
            $table->id();

            $table->longText("note")->nullable();
            $table->string("order_id");
            $table->date("date");

            $table->foreignId('user_id')->constrained("users")->cascadeOnDelete();
            $table->foreignId('main_category_id')->constrained("main_categories")->cascadeOnDelete();
            $table->foreignId('employee_id')->constrained("employees")->cascadeOnDelete();
            $table->foreignId('sub_category_id')->constrained("sub_categories")->cascadeOnDelete();

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
        Schema::dropIfExists('outputs');
    }
}
