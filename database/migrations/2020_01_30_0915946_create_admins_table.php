<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /**
         * Role Id  has the floowing
         * 1=== Supper user who can approve applicants request
         * 2=== Field Monitor who can monitor and record how funds are been spent
         * 
         */
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('image')->nullable();
            $table->string('password');
            $table->string('phoneno')->nullable();
            $table->integer('level')->nullable(); //
            $table->string('adminroles')->nullable();
            $table->bigInteger('district_id')->unsigned();
            $table->foreign('district_id')->references('id')->on('districts');
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
        Schema::dropIfExists('admins');
    }
}
