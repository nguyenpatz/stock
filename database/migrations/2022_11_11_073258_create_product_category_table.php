<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_category', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->constrained('product_category');
            // $table->foreign('parent_id')->references('id')->on('');
            // $table->integer('warehouse_id');
            // $table->foreign('warehouse_id')->references('id')->on('warehouse');
            $table->foreignId('warehouse_id')->constrained('warehouse');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_category');
    }
};
