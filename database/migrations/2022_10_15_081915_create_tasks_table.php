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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('employee_id');
            $table->date('day');
            $table->text('content');
            $table->string('status');
            $table->date('daywork');
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


        Schema::table('tasks', function (Blueprint $table) {
            //Drop foreign key
            $table->dropForeign('employee_id');

        });


        Schema::dropIfExists('tasks');
    }
};
