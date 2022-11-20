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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('template_id')->constrained('template');
            $table->text('name');
            $table->text('note')->nullable();
            $table->string('state');
            $table->integer('amount');
            $table->float('height');
            $table->float('length');
            $table->float('width');
            $table->float('weight')->nullable();
            $table->text('color')->nullable();
            $table->double('price');
            $table->double('price_cost');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
};
