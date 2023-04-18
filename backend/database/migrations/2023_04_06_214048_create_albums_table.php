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
        Schema::create('albums', function (Blueprint $table) {
            $table->string("album_name")->primary();
            $table->string("album_url");
            $table->string("album_cover")->nullable();
            $table->string("release_year");
            $table->json("description")->nullable();
            $table->string("album_type");
            $table->string("spotify_url");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};
