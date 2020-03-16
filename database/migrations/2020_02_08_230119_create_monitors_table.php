<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('region');
            $table->integer('district');
            $table->integer('quarter');
            $table->date('registered');
            $table->bigInteger('applicant_id')->unsigned();
            $table->foreign('applicant_id')->references('id')->on('applicants');
            $table->string('name')->nullable();
            $table->string('disabilitytype')->nullable();
            $table->string('gender')->nullable();
            $table->string('idtype')->nullable();
            $table->string('houseno')->nullable();
            $table->string('streetname')->nullable();
            $table->string('postaladdress')->nullable();
            $table->string('phoneno')->nullable();
            $table->text('activity_type')->nullable();
            $table->text('activity_undertaken');
            $table->text('expenditure')->nullable();
            $table->boolean('made_gains')->default(false);
            $table->text('gains')->nullable();
            $table->text('nogain_reasons')->nullable();
            $table->text('additional_info')->nullable();
            $table->text('recommendations')->nullable();
            $table->integer('admin1')->nullable();
            $table->integer('admin2')->nullable();
            $table->integer('admin3')->nullable();


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
        Schema::dropIfExists('monitors');
    }
}
