<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demo', function (Blueprint $table) {
            $table->integer('aadhaar_card_number')->autoIncrement(); // Auto-incrementing integer
            $table->string('tenth_board_roll_number', 50)->nullable();
            $table->string('tenth_student_name', 255)->nullable();
            $table->string('twelfth_board_roll_number', 50)->nullable();
            $table->string('domicile_number', 50)->nullable();
            $table->string('income_certificate_number', 50)->nullable();
            $table->primary('aadhaar_card_number'); // Primary key
            $table->timestamps(); // Created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demo');
    }
}