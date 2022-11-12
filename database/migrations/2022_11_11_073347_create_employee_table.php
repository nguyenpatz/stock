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
        if(!Schema::hasTable('employee')) {
            
            Schema::create('employee', function (Blueprint $table) {
                $table->id();
                $table->text('name');
                $table->text('address');
                $table->string('email');
                $table->string('phone');
                $table->binary('avatar');
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
        // Schema::dropIfExists('employee');
    }
};
