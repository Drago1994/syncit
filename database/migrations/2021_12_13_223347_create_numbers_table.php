<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('numbers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('contact_id');
            $table->string('label')->nullable(false);
            $table->string('number')->nullable(false);
        });

        Schema::table('numbers', function (Blueprint $table) {
            $table->foreign('contact_id')
            ->references('id')
            ->on('contacts')
            //->onDelete('cascade')
            ->nullable(false);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('numbers');
    }
}
