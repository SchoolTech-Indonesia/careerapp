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
    Schema::create('applicant', function (Blueprint $table) {
        $table->uuid('id')->primary();
        $table->string('fullname'); // Wajib
        $table->string('email')->unique(); // Wajib, harus unik
        $table->string('phone_number')->nullable(); // Menjadi nullable
        $table->string('portfolio_link')->nullable(); // Menjadi nullable
        $table->uuid('id_opportunity'); // Tipe UUID
        $table->foreign('id_opportunity')->references('id')->on('opportunities')->onDelete('cascade'); // Menambahkan onDelete untuk referensi
        $table->string('cv_path')->nullable(); // Menjadi nullable
        $table->enum('gender', ['male', 'female'])->nullable(); // Menjadi nullable
        $table->date('birthdate')->nullable(); // Menjadi nullable
        $table->string('address')->nullable(); // Menjadi nullable
        $table->string('religion')->nullable(); // Menjadi nullable
        $table->enum('marital_status', ['single', 'married'])->nullable(); // Menjadi nullable
        $table->string('last_education')->nullable(); // Menjadi nullable
        $table->string('education_name')->nullable(); // Menjadi nullable
        $table->string('major_name')->nullable(); // Menjadi nullable
        $table->decimal('gpa', 3, 2)->nullable(); // Menjadi nullable
        $table->boolean('graduate_status')->default(0); // Status kelulusan tidak diubah
        $table->integer('graduate_year')->nullable(); // Menjadi nullable
        $table->string('know_opportunity_form')->nullable(); // Menjadi nullable
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('applicants');
    }
};
