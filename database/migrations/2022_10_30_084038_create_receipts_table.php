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
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->string('price');
            $table->string('type');
            $table->text('content');
            $table->unsignedBigInteger('employee_id');
            $table->date('day');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('receipts', function (Blueprint $table) {
            //Drop foreign key
            $table->dropForeign('employee_id');

        });
        Schema::dropIfExists('receipts');
    }
};
