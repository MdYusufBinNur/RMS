<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('constructor_id');
            $table->unsignedBigInteger('task_id');

            $table->string('geo_points')->nullable();
            $table->longText('comment')->nullable();
            $table->longText('photos')->nullable();
            $table->double('rating')->nullable();

            $table->timestamps();

            $table->foreign('constructor_id')
                ->references('id')
                ->on('constructors')
                ->onDelete('cascade');

            $table->foreign('task_id')
                ->references('id')
                ->on('tasks')
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
        Schema::dropIfExists('comments');
    }
}
