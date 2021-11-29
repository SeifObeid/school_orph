<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('note');

            $table->string('invoice_number');
            $table->date('date');

            $table->boolean('setting_record');

            $table->foreignId('supplier_id')->constrained("suppliers")->cascadeOnDelete();
            $table->foreignId('user_id')->constrained("users")->cascadeOnDelete();


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
        Schema::dropIfExists('entries');
    }
}
