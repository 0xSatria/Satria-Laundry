<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventorie', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_brand');
            $table->integer('quantity');
            $table->enum('condition', ['NORMAL', 'SLOW', 'BROKEN']);
            $table->date('restock_date');
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
        Schema::dropIfExists('inventorie');
    }
}
