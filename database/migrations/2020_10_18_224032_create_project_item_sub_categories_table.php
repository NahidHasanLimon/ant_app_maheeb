<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectItemSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_item_sub_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_sub_category_name')->nullable();
            $table->unsignedInteger('item_category_id')->nullable();
            $table->foreign('item_category_id')->references('id')->on('project_item_categories')->onDelete('cascade');
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
        Schema::dropIfExists('project_item_sub_categories');
    }
}
