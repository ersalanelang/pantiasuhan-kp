@inject('carbon', 'Carbon\Carbon')

<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Data Anak Asuh</h1>
<h2>Cetak Berdasarkan Filter {{$cetak}} </h2>
<text>Tanggal Awal : {{$tglAwal}}<br></text>
<text>Tanggal Akhir : {{$tglAkhir}}</text>
<br></br>

<table id="customers">
<tr>
    <th>#</th>
    <th>Nama</th>
    <th>Foto</th>
    <th>Usia</th>
    <th>Jenis Kelamin</th>
    <th>Tempat lahir</th>
    <th>Tanggal Lahir</th>
    <th>Status</th>
    <th>Kategori</th>
    <th>Tanggal Masuk</th>
    <th>Tanggal Keluar</th>
  </tr>
  @php
    $no = 1;
  @endphp
  @foreach ($data as $row)
  <tr>
    <td>{{$no++}}</td>
    <td>{{$row -> Nama}}</td>
    <td>
        <img src="{{public_path('images/foto/'.$row->Foto)}}" alt="" style="width: 80px; height: 80px;"/>
    </td>
    <td>{{$row -> age}}</td>
    <td>{{$row -> JenisKelamin}}</td>
    <td>{{$row -> TempatLahir}}</td>
    <td>{{ \Carbon\Carbon::parse($row->TanggalLahir)->format('d-m-Y')}}</td>
    <td>{{$row -> Status}}</td>
    <td>{{$row -> kategoris->Kategori}}</td>
    <td>{{ \Carbon\Carbon::parse($row->TanggalMasuk)->format('d-m-Y')}}</td>
    @if ($row->TanggalKeluar != NULL)
      <td>{{ \Carbon\Carbon::parse($row->TanggalKeluar)->format('d-m-Y') }}</td>
    @endif
    @if ($row->TanggalKeluar == NULL)
      <td>{{$row->TanggalKeluar}}</td>
    @endif
  </tr>
  @endforeach
</table>

</body>
</html>


