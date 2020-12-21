<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lead_brand_name');
            $table->unsignedInteger('lead_company_id');
            $table->foreign('lead_company_id')->references('id')->on('lead_companies')->onDelete('cascade');
            // $table->integer('lead_company_id');
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
        Schema::dropIfExists('lead_brands');
    }
}
