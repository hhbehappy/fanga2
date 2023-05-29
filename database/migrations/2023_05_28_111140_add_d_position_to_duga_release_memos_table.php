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
        Schema::table('duga_release_memos', function (Blueprint $table) {
            $table->string('f_position')->default('top')->after('release');
            $table->string('f_link')->nullable()->after('f_position');
            $table->unsignedBigInteger('f_no')->nullable()->after('f_link');
            $table->string('d_position')->default('top')->after('f_no');
            $table->string('d_link')->nullable()->after('d_position');
            $table->unsignedBigInteger('d_no')->nullable()->after('d_link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('duga_release_memos', function (Blueprint $table) {
            $table->dropColumn('f_position');
            $table->dropColumn('f_link');
            $table->dropColumn('f_no');
            $table->dropColumn('d_position');
            $table->dropColumn('d_link');
            $table->dropColumn('d_no');
        });
    }
};
