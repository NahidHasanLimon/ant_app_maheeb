<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('projects_name')->nullable();
            $table->string('project_nature')->nullable();
            $table->string('project_frequency')->nullable();
            $table->unsignedInteger('company_id')->nullable();
            $table->unsignedInteger('project_sub_category_id')->nullable();
            $table->unsignedInteger('project_category_id')->nullable();

            $table->foreign('company_id')->references('id')->on('lead_companies')->onDelete('cascade');
            $table->foreign('project_sub_category_id')->references('id')->on('projects_sub_categories')->onDelete('cascade');
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
        Schema::dropIfExists('projects');
    }
}
