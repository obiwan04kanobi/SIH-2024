<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAadharTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aadhar', function (Blueprint $table) {
            $table->string('aadhar_number', 12)->primary();  // Aadhar number as primary key
            $table->string('name', 100);                     // Name column
            $table->string('father_name', 100);              // Father's name column
            $table->string('state', 100);                    // State column
            $table->timestamps();                            // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aadhar');
    }
}
