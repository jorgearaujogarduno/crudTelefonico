<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelephoneCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telephone_customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('telephone_id');
            $table->foreign('telephone_id')->references('id')->on('telephones');  
            $table->string('name', 100);
            $table->string('ap_paterno', 100);
            $table->string('ap_materno', 100);
            $table->bigInteger('numero_telefonico');
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
        Schema::dropIfExists('telephone_customers');
    }
}
