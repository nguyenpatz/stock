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
        if(!Schema::hasTable('order')) {
            Schema::create('order', function (Blueprint $table) {
                $table->id();
                $table->text('name');
                $table->foreignId('partner_id')->constrained('partner');
                $table->dateTime('create_date');
                $table->dateTime('expiration_date');
                $table->dateTime('received_date');
                $table->foreignId('employee_id')->constrained('employee');
                $table->foreignId('pricelist_id')->constrained('price_list');
                $table->text('payment_term')->nullable();
                $table->text('state');
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
        // Schema::dropIfExists('order');
    }
};
