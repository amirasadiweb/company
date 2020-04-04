<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {

            $table->Increments('id');
            $table->integer('company_id')->unsigned()->index();
         
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employes');
    }
}
