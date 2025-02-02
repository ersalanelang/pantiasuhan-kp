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
        Schema::create('kategoris', function (Blueprint $table) {
            $table->id();
            $table->enum('Kategori', ['Aktif', 'Keluar'])->default('Aktif');
            $table->timestamps();
        });
        // Insert some stuff
        DB::table('kategoris')->insert(
            array(
                'Kategori' => 'Aktif',
            )
        );
        DB::table('kategoris')->insert(
            array(
                'Kategori' => 'Keluar',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategoris');
    }
};
