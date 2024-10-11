<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('email')->unique();
            $table->string('phone_number'); // Ganti 'phone' menjadi 'phone_number' agar konsisten dengan controller
            $table->string('portfolio_link')->nullable();
            $table->string('cv_path')->nullable();
            $table->enum('gender', ['Men', 'Women']);
            $table->date('birthdate');
            $table->text('address');
            $table->enum('religion', ['Islam', 'Kristen', 'Other']);
            $table->enum('marital_status', ['Married', 'Not Married']);
            $table->enum('last_education', ['High School', 'Diploma', 'Bachelor', 'Master', 'Doctorate']);
            $table->string('education_name');
            $table->string('major_name'); // Ganti 'majority_name' menjadi 'major_name' agar konsisten
            $table->decimal('gpa', 3, 2)->nullable();
            $table->enum('graduate_status', ['Graduated', 'Not Graduated']);
            $table->year('graduate_year');
            $table->string('know_opportunity_form');
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
        Schema::dropIfExists('applicants');
    }
};
