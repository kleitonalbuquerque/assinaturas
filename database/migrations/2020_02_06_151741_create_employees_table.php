<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('name', 100);
            $table->string('mail', 100)->unique();
            $table->string('office', 100);
            $table->string('image', 100);
            $table->unsignedBigInteger('company')->nullable();
            $table->foreign('company')->references('id')->on('companies')->onDelete('cascade');
            $table->unsignedBigInteger('phone')->nullable();
            $table->foreign('phone')->references('id')->on('phones')->onDelete('cascade');
            $table->unsignedBigInteger('city')->nullable();
            $table->foreign('city')->references('id')->on('cities')->onDelete('cascade');
            $table->boolean('validate')->default(0);
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
        Schema::dropIfExists('employees');
    }
}
