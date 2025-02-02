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
            $table->string('Asal');    //x
            // Hubungan Kontak
            $table->string('Penanggungjawab'); //x
            $table->string('Tinggal');  //x
            $table->string('NoKontak');  //x
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
            $table->dropColumn('Asal');    //x
            // Hubungan Kontak
            $table->dropColumn('Penanggungjawab'); //x
            $table->dropColumn('Tinggal');  //x
            $table->dropColumn('NoKontak');  //x
        });
    }
};
