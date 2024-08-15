<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->integer('country_id');
            $table->integer('education_id');
            $table->enum('is_job',['True','False']);
            $table->enum('is_remote',['True','False']);
            $table->string('hear_us');
            $table->string('resume');
            $table->string('profile');
            $table->enum('status',['Accepted','Rejected','Reviewing']);
            $table->string('ip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
