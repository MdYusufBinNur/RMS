<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('isFinished')->default(0); //0->false, 1->true, 2->pending[Constructor will make a request after the assigned project is completely done]
            $table->unsignedBigInteger('constructor_id');
            $table->unsignedBigInteger('area_id');
            $table->string('task_name')->nullable();
            $table->longText('task_details')->nullable();
            $table->string('task_budget')->nullable();
            $table->string('qr_code')->nullable();
            $table->timestamps();

            $table->foreign('constructor_id')
                ->references('id')
                ->on('constructors')
                ->onDelete('cascade');

            $table->foreign('area_id')
                ->references('id')
                ->on('areas')
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
        Schema::dropIfExists('tasks');
    }
}
