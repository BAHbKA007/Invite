<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
Schema::enableForeignKeyConstraints();

class CreateDabeiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dabei', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('created_at');
            $table->string('name');
            $table->integer('dabei')->default(2);
            $table->integer('names_id')->unsigned()->nullable();
            $table->foreign('names_id')
                ->references('id')
                ->on('names')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dabei');
    }
}
