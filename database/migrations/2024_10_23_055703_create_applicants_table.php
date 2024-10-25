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
            $table->string('id')->primary(); // Primary key
            $table->string('opportunity_id'); // Foreign key for opportunity
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('gender_id'); // Foreign key for gender
            $table->date('birth_date');
            $table->string('domicile_address');
            $table->string('religion_id'); // Foreign key for religion
            $table->string('marital_id'); // Foreign key for marital status
            $table->string('education_id'); // Foreign key for education level
            $table->string('education_institution');
            $table->string('majority');
            $table->string('gpa');
            $table->string('graduate_status'); // lulus/belum
            $table->string('graduate_year');
            $table->string('information_from'); // darimana mendapatkan informasi pekerjaan
            $table->string('portfolio_link');
            $table->string('cv_file');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('applicants');
    }
};

