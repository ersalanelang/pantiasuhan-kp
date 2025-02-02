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
        Schema::create('anak__asuhs', function (Blueprint $table) {
            $table->id();
            // Identitas Anak
            $table->string('Nama');
            $table->enum('JenisKelamin', ['Laki-laki','Perempuan']);
            $table->string('TempatLahir');
            $table->date('TanggalLahir');       
            $table->string('Agama');  ## fix pake enum
            $table->enum('Goldarah', ['A','B','O','AB']);

            // Pendidikan
            $table->string('NamaSekolah');
            $table->enum('Kelas', ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII','Tidak bersekolah'])->nullable();
            // $table->string('Kelas');

            // $table->enum('Pendidikan', ['SD','SMP','SMA','Tidak bersekolah']);
            $table->string('Jenjang')->default('-');
            // $table->enum('KelasPutus', ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII','Tidak bersekolah'])->nullable();
            $table->string('NoSekolah');
            
            // Informasi Tentang Keluarga
            $table->string('NamaAyah')->nullable();
            $table->string('NIKAyah')->nullable();
            $table->string('NamaIbu')->nullable();
            $table->string('NIKIbu')->nullable();
            $table->string('AlamatOrtu'); 
            $table->string('NoOrtu'); 
            
            // Data Anak
            $table->enum('Status', ['Yatim','Piatu','Yatim Piatu','Dhuafa']); # yatim, piatu, yatim piatu, dhuafa
            $table->date('TanggalMasuk');
            $table->date('TanggalKeluar')->nullable();
            $table->string('NIK')->nullable();
            $table->string('NoKK')->nullable();
            $table->string('NISN')->nullable();
            $table->string('NoAkta')->nullable();

            // Upload Data
            $table->string('Foto');
            $table->string('ScanKK')->nullable();
            $table->string('ScanAkta')->nullable();
            $table->string('ScanKISBPJS')->nullable();
            $table->string('ScanKIP')->nullable();
            $table->string('ScanKMS')->nullable();
            $table->string('ScanKIAKTP')->nullable();

            $table->string('ScanIjazahSD')->nullable();
            $table->string('ScanIjazahSMP')->nullable();
            $table->string('ScanIjazahSMA')->nullable();
            $table->string('ScanFileSosial')->nullable();
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
        Schema::dropIfExists('anak__asuhs');
    }
};
