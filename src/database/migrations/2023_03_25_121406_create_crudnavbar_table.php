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
        Schema::create('crud_navbar', function (Blueprint $table) {
            $table->id();
			$table->string('location');
			$table->unsignedBigInteger('parent')->nullable();
			$table->unsignedSmallInteger('order');
			$table->string('name');
			$table->string('slug')->nullable();
            $table->timestamps();
			$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crud_navbar');
    }
};
