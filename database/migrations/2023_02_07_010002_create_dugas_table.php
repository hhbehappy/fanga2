<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dugas', function (Blueprint $table) {
            $table->id();
            $table->string('productid');
            $table->string('title');
            $table->string('volume')->nullable();
            $table->text('caption')->nullable();
            $table->string('maker')->nullable();
            $table->string('label')->nullable();
            $table->string('series')->nullable();
            $table->string('performer')->nullable();
            $table->string('director')->nullable();
            $table->string('category')->nullable();
            $table->string('affiliateurl')->nullable();
            $table->string('jacketimage')->nullable();
            $table->string('posterimage')->nullable();
            $table->string('thumbnail01')->nullable();
            $table->string('thumbnail02')->nullable();
            $table->string('thumbnail03')->nullable();
            $table->string('thumbnail04')->nullable();
            $table->string('thumbnail05')->nullable();
            $table->string('thumbnail06')->nullable();
            $table->string('thumbnail07')->nullable();
            $table->string('thumbnail08')->nullable();
            $table->string('thumbnail09')->nullable();
            $table->string('thumbnail10')->nullable();
            $table->string('date')->nullable();
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
        Schema::dropIfExists('dugas');
    }
};
