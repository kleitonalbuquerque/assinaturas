<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('name', 100);
            $table->string('site', 100);
            $table->char('phone', 20);
            $table->char('color', 7)->default('#000000');
            $table->string('image', 100);
            $table->timestamps();
        });
        Schema::create('phones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('phone', 20);
            $table->unsignedBigInteger('company');
            $table->foreign('company')->references('id')->on('companies')->onDelete('cascade');
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
        Schema::dropIfExists('phones');
        Schema::dropIfExists('companies');
    }
}
