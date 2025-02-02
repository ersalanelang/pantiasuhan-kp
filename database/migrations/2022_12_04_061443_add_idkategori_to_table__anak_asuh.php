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
        Schema::table('anak__asuhs', function (Blueprint $table) {
            // $table->integer('id_kategori');
            $table->integer('id_kategori')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anak__asuhs', function (Blueprint $table) {
            // $table->dropColumn('id_kategori');
            $table->dropColumn('id_kategori')->default('1');
        });
    }
};
