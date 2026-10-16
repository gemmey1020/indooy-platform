<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandingPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name_en');
            $table->string('company_name_ar');
            $table->string('business_email');
            $table->string('business_phone');
            $table->string('company_logo');
            $table->string('category_list');
            $table->string('keyword_list');
            $table->string('country_list');
            $table->string('cities_list');
            $table->string('district_list');
            $table->string('Main_address');
            // $table->string('address_telephone');

            $table->text('desc_en');
            $table->text('desc_ar');

            $table->string('facebookAcc');
            $table->string('twitter');
            $table->string('googleAcc');

            $table->string('customer_id');
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
        Schema::dropIfExists('landing_pages');
    }
}
