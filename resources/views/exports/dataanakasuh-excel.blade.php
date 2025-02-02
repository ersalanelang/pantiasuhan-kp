<style>
    th{  
        font-weight: bold;
        text-align: center;
        vertical-align: middle;
    }
</style>

<table>        
    <thead>
        <tr>
            <th colspan="20" style="text-align: center;">REKAP DATA ANAK ASUH TAHUN 2022</th>
        </tr>
        <tr>
            <th colspan="20" style="text-align: center;">UPT RUMAH PENGASUHAN ANAK WILOSO PROJO</th>
        </tr>
        <tr>
            <th></th>
        </tr>
        <tr >
            <th style="text-align: center;"><b>Nama</b></th>
            <th style="text-align: center;"><b>Jenis Kelamin</b></th>
            <th style="text-align: center;"><b>Tempat Tanggal Lahir</b></th>
            <th style="text-align: center;"><b>Agama</b></th>
            <th style="text-align: center;"><b>Pendidikan</b></th>
            <th style="text-align: center;"><b>Kelas</b></th>
            <th style="text-align: center;"><b>Nama Ayah</b></th>
            <th style="text-align: center;"><b>Nama Ibu</b></th>
            <th style="text-align: center;"><b>Alamat Awal</b></th>
            <th style="text-align: center;"><b>NIK</b></th>
            <th style="text-align: center;"><b>No KK</b></th>
            <th style="text-align: center;"><b>No Akta Kelahiran</b></th>
            <th style="text-align: center;"><b>Ket Masuk KPA</b></th>
            <th style="text-align: center;"><b>No Sekolah</b></th>
            <th style="text-align: center;"><b>NISN</b></th>
            <th style="text-align: center;"><b>KIS/BPJS</b></th>
            <th style="text-align: center;"><b>KIP</b></th>
            <th style="text-align: center;"><b>KMS</b></th>
            <th style="text-align: center;"><b>KIA/KTP</b></th>
            <th style="text-align: center;"><b>Gol Darah</b></th>
        </tr>
        <tr>
            <th style="text-align: center;">1</th>
            <th style="text-align: center;">2</th>
            <th style="text-align: center;">3</th>
            <th style="text-align: center;">4</th>
            <th style="text-align: center;">5</th>
            <th style="text-align: center;">6</th>
            <th style="text-align: center;" colspan="2">8</th>
            <th style="text-align: center;">9</th>
            <th style="text-align: center;">10</th>
            <th style="text-align: center;">11</th>
            <th style="text-align: center;">12</th>
            <th style="text-align: center;">13</th>
            <th style="text-align: center;">14</th>
            <th style="text-align: center;">15</th>
            <th style="text-align: center;">16</th>
            <th style="text-align: center;">17</th>
            <th style="text-align: center;">18</th>
            <th style="text-align: center;">19</th>
            <th style="text-align: center;">20</th>
        </tr>
    </thead>
    <tbody>
    @foreach($data as $row)
        <tr>
            <td>{{$row->Nama}}</td>
            <td>{{$row->JenisKelamin}}</td>
            <td>{{$row->TempatLahir}}, {{$row->TanggalLahir}}</td>
            <td>{{$row->Agama}}</td>
            <td>{{$row->Jenjang}}</td>
            <td>{{$row->Kelas}}</td>
            <td>{{$row->NamaAyah}}</td>
            <td>{{$row->NamaIbu}}</td>
            <td>{{$row->AlamatOrtu}}</td>
            <td>{{$row->NIK}}</td>
            <td>{{$row->NoKK}}</td>
            <td>{{$row->NoAkta}}</td>
            <td>{{$row->Status}}</td>
            <td>{{$row->NoSekolah}}</td>
            <td>{{$row->NISN}}</td>
            <td>{{$row->ScanKISBPJS}}</td>
            <td>{{$row->ScanKIP}}</td>
            <td>{{$row->ScanKMS}}</td>
            <td>{{$row->ScanKIAKTP}}</td>
            <td>{{$row->Goldarah}}</td>
        </tr>
    @endforeach
    </tbody>
</table>