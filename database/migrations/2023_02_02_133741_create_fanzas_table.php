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
        Schema::create('fanzas', function (Blueprint $table) {
            $table->id();
            $table->string('content_id');
            $table->string('title')->nullable();
            $table->string('volume')->nullable();
            $table->string('actress')->nullable();
            $table->string('maker')->nullable();
            $table->string('label')->nullable();
            $table->string('series')->nullable();
            $table->string('director')->nullable();
            $table->string('genre')->nullable();
            $table->string('genre1')->nullable();
            $table->string('genre2')->nullable();
            $table->string('genre3')->nullable();
            $table->string('genre4')->nullable();
            $table->string('genre5')->nullable();
            $table->string('genre6')->nullable();
            $table->string('genre7')->nullable();
            $table->string('genre8')->nullable();
            $table->string('genre9')->nullable();
            $table->string('affiliateURL')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('fanzas');
    }
};
