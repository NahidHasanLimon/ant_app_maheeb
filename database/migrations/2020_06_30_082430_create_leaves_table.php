<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
           
            $table->timestamp('start_date',6)->nullable();
            $table->timestamp('end_date',6)->nullable();
            $table->text('notes_by_requester')->nullable();
            $table->text('documents')->nullable();
            $table->integer('leave_type')->unsigned()->nullable();
          
            $table->tinyInteger('is_approved_superadmin')->default('0');
            $table->tinyInteger('is_approved_supervisor')->default('0');

            $table->timestamp('superadmin_approval_date',6)->nullable();
            $table->timestamp('supervisor_approval_date',6)->nullable();

            $table->integer('approving_superadmin_id')->unsigned()->nullable();
            $table->integer('approving_supervisor_id')->unsigned()->nullable();

            $table->foreign('approving_superadmin_id')->references('id')->on('users');
            $table->foreign('approving_supervisor_id')->references('id')->on('users');
            $table->foreign('leave_type')->references('id')->on('leave_types');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('leaves');
    }
}
