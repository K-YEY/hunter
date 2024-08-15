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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('type_id');
            $table->unsignedBigInteger('cover_id');
            $table->string('title');
            $table->string('sub_title');
            $table->longText('list_of_text');
            $table->longText('desc');
            $table->enum('status',['Publish','Draft']);
            $table->timestamps();
            $table->foreign('cover_id')->references('id')->on('images')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
