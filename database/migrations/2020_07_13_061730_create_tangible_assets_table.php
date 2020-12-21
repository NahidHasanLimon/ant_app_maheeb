<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTangibleAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tangible_assets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tangible_asset_name')->nullable();
            $table->string('tangible_asset_quantity')->nullable();
            $table->unsignedInteger('tangible_category_id')->nullable();
            // $table->Integer('company_id');
            $table->foreign('tangible_category_id')->references('id')->on('tangible_categories')->onDelete('cascade');
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
        Schema::dropIfExists('tangible_assets');
    }
}
