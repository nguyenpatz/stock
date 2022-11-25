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
            Schema::create('template', function (Blueprint $table) {
                $table->id();
                $table->text('name');
                $table->integer('amount');
                $table->foreignId('category_id')->constrained('product_category');
                $table->date('date_manufacture');
                $table->date('expiry_date')->nullable();
                $table->text('note')->nullable();
                $table->string('state');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('template');
    }
};
