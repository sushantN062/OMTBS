<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Person', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name');
            $table->string(column: 'address');
            $table->integer(column: 'age');
            $table->timestamp(column: 'dob');
            $table->timestamp();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students', function (Blueprint $table) {

            $table->id();
            $table->string(column: 'name');
            $table->string(column: 'address');
            $table->integer(column: 'age');
            $table->timestamp(column: 'dob');
            $table->timestamp();

            });
    }
};
