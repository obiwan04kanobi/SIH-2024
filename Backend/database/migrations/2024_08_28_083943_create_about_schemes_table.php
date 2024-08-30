<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutSchemesTable extends Migration
{
    public function up()
    {
        Schema::create('about_schemes', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('url');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('about_schemes');
    }
}