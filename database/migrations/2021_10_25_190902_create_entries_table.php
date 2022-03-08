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
            $table->longText('note')->nullable();

            $table->string('invoice_number');
            $table->date('date');

            $table->boolean('entry_insurance')->default(false);

            $table->foreignId('supplier_id')->nullable()->constrained("suppliers");
            $table->foreignId('user_id')->constrained("users")->cascadeOnDelete();
            $table->foreignId('main_category_id')->constrained("main_categories")->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();

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
