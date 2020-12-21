<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lead_brand_id')->nullable();
            $table->unsignedInteger('lead_company_id')->nullable();
            $table->string('projects_name')->nullable();
            $table->unsignedInteger('status_category_id')->nullable();
            $table->unsignedInteger('status_id')->nullable();
            $table->unsignedInteger('kam_id')->nullable();
            $table->date('work_order_month')->nullable();
            $table->date('project_complete_month')->nullable();
            $table->integer('revenue')->nullable();
            $table->integer('cost')->nullable();
            $table->integer('usable_revenue')->nullable();
            $table->integer('type')->nullable();
            $table->string('journal_link')->nullable();



            $table->foreign('lead_brand_id')->references('id')->on('lead_brands')->onDelete('cascade');
            $table->foreign('lead_company_id')->references('id')->on('lead_companies')->onDelete('cascade');
            $table->foreign('status_category_id')->references('id')->on('project_status_categories')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('project_statuses')->onDelete('cascade');
            $table->foreign('kam_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('new_projects');
    }
}
