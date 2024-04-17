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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('title');
            $table->string('description');
            $table->integer("id_district");
            $table->integer("id_ward");
            $table->float("acreage");
            $table->bigInteger('rent');
            $table->bigInteger('electric_price');
            $table->bigInteger('water_price');
            $table->integer("views");
            $table->integer("interests");
            $table->integer("id_status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
