<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('image')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('idtype')->nullable();
            $table->string('idnumber')->nullable();
            $table->date('dob')->nullable();
            $table->String('gfdmember')->nullable();

            $table->string('disabilitytype')->nullable()->nullable();

            $table->string('community')->nullable()->nullable();
            $table->string('postal_address')->nullable()->nullable();
            $table->string('houseno')->nullable()->nullable();
            $table->string('phoneno')->nullable()->nullable();
            $table->string('streetname')->nullable()->nullable();
            $table->string('business_location')->nullable()->nullable();

            $table->string('education')->nullable()->nullable();

            $table->string('occupation')->nullable()->nullable();
            $table->string('yearsinobusines')->nullable()->nullable();
            $table->integer('dependants')->nullable()->nullable();

            $table->String('objective')->nullable()->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->text('intentoffund')->nullable();
            $table->integer('total_amount')->nullable();
            $table->integer('approvedAmt')->default(0);
            $table->text('groupapplication')->nullable();

            $table->text('breakdown')->nullable();
            $table->String('info_approval')->nullable();

            $table->boolean('approved')->nullable()->default(false);
            $table->integer('approved1')->nullable()->default(0);
            $table->integer('approved2')->nullable()->default(0);
            $table->integer('approved3')->nullable()->default(0);

            $table->String('region')->nullable();
            $table->String('district')->nullable();
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
        Schema::dropIfExists('applicants');
    }
}
