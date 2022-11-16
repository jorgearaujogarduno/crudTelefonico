<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoriteNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorite_numbers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('telephone_customer_id');
            $table->foreign('telephone_customer_id')->references('id')->on('telephone_customers');
            $table->unsignedBigInteger('telephone_id');
            $table->foreign('telephone_id')->references('id')->on('telephones');
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
        Schema::dropIfExists('favorite_numbers');
    }
}
