<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_sub_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('projects_sub_category_name')->nullable();
            $table->unsignedInteger('project_category_id')->nullable();
            $table->foreign('project_category_id')->references('id')->on('projects_categories')->onDelete('cascade');
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
        Schema::dropIfExists('projects_sub_categories');
    }
}
