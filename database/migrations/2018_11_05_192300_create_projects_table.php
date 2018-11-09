<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
Schema::enableForeignKeyConstraints();

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('created_at');
            $table->string('title');
            $table->mediumtext('welcome_text')->nullable();
            $table->mediumtext('welcome_text_plural')->nullable();
            $table->string('phone')->nullable();
            $table->mediumtext('location_text')->nullable();
            $table->string('bg_jpg')->nullable();
            $table->string('pic_jpg')->nullable();
            $table->string('favicon_jpg')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('projects');
    }
}
