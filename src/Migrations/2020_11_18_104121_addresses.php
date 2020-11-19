<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Addresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('line_1', 100);
            $table->string('line_2', 100)->nullable();
            $table->string('line_3', 100)->nullable();
            $table->string('city', 50);
            $table->string('county', 100);
            $table->string('postcode', 32);
            $table->integer('country_id')->unsigned()->index();
            $table->string('longitude',15);
            $table->string('latitude',15);
            $table->morphs('relation');
            $table->softDeletes();
            $table->timestamps(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
