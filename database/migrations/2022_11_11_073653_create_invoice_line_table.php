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
        if(!Schema::hasTable('invoice_line')) {

            Schema::create('invoice_line', function (Blueprint $table) {
                $table->id();
                $table->foreignId('product_id')->constrained('product');
                $table->foreignId('invoice_id')->constrained('invoice');
                $table->double('total_money');
                $table->double('volume');
                //duration - số ngày lưu kho
                $table->float('duration');
                $table->text('note')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_line');
    }
};
