<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebSiteCreationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_site_creations', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('avatar');
          $table->string('address');
          $table->string('country');
          $table->string('city');
          $table->string('district');
          $table->string('username')->unique();
          $table->string('email')->unique();
          $table->string('password');
          $table->rememberToken();
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
        Schema::dropIfExists('web_site_creations');
    }
}
