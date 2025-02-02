@extends('layout.admin')

@push('css')
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
  <!-- Date picker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- line horizontal -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@endpush

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Anak Asuh</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="/anakasuh">Anak Asuh</a></li>
              <li class="breadcrumb-item active">Edit Anak Asuh</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container"> 
      <div class="row justify-content-center">
        <div class="col-8">
          <div class="card">
            <div class="card-body">
              <form action="/updatedata/{{$data->id}}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="mb-3">
                  <div class="row">
                    <div class="col-auto"><h4>Identitas Anak</h4></div>
                    <div class="col"><hr></div>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                  <input type="text" name="Nama" class="form-control" id="exampleFormControlInput1" value="{{$data->Nama}}" required>
                  @error('Nama')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <div class="row">      
                    <div class="col-sm-4">
                      <label for="date" class="col-form-label">Tanggal Lahir</label>
                      <div class="input-group date" id="datepicker">
                          <input type="text" name="TanggalLahir" class="form-control" value="{{$data->TanggalLahir}}" required>
                          <span class="input-group-append">
                              <span class="input-group-text bg-white d-block">
                                  <i class="fa fa-calendar"></i>
                              </span>
                          </span>
                          @error('TanggalLahir')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <label for="exampleFormControlInput1" class="col-form-label">Tempat Lahir</label>
                      <input type="text" name="TempatLahir" class="form-control" id="exampleFormControlInput1" value="{{$data->TempatLahir}}" required>
                      @error('TempatLahir')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-sm-4">
                      <label for="exampleFormControlInput1" class="col-form-label">Asal Daerah/Suku</label>
                      <input type="text" name="Asal" class="form-control" value="{{$data->Asal}}" id="exampleFormControlInput1" required>
                      @error('Asal')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="mb-4">
                  <div class="row">
                    <div class="col-sm-4">
                      <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                      <select class="form-select" name="JenisKelamin" aria-label="Default select example" required>
                        <option selected>{{$data->JenisKelamin}}</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                      @error('JenisKelamin')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-sm-4">
                      <label for="exampleFormControlInput1" class="form-label">Agama</label>
                      <select class="form-select" name="Agama" aria-label="Default select example" required>
                        <option selected>{{$data->Agama}}</option>
                        <option value="Islam">Islam</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Kristen Protestan">Kristen Protestan</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Konghucu">Konghucu</option>
                      </select>
                      @error('Agama')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-sm-4">
                      <label for="exampleFormControlInput1" class="form-label">Golongan Darah</label>
                      <select class="form-select" name="Goldarah" aria-label="Default select example" required>
                        <option selected>{{$data->Goldarah}}</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="O">O</option>
                        <option value="AB">AB</option>
                      </select>
                      @error('Goldarah')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="row">
                    <div class="col-auto"><h4>Riwayat Pendidikan Terakhir</h4></div>
                    <div class="col"><hr></div>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="row">
                    <div class="col-sm-12">
                      <label for="exampleFormControlInput1" class="form-label">Nama Sekolah</label>
                      <input type="text" name="NamaSekolah" class="form-control" id="exampleFormControlInput1" value="{{$data->NamaSekolah}}" required>
                      @error('NamaSekolah')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>   
                </div>
                <div class="mb-4">
                  <div class="row">
                    <div class="col-sm-6">
                      <label for="exampleFormControlInput1" pclass="form-label">Kelas</label>
                      <select class="form-select" name="Kelas" aria-label="Default select example" required>
                        <option selected>{{$data->Kelas}}</option>
                        <option value="I">I</option>
                        <option value="II">II</option>
                        <option value="III">III</option>
                        <option value="IV">IV</option>
                        <option value="V">V</option>
                        <option value="VI">VI</option>
                        <option value="VII">VII</option>
                        <option value="VIII">VIII</option>
                        <option value="IX">IX</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                        <option value="Tidak Bersekolah">Tidak Bersekolah</option>
                      </select>
                      @error('Kelas')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-sm-6">
                      <label for="exampleFormControlInput1" class="form-label">No Sekolah</label>
                      <input type="text" name="NoSekolah" class="form-control" id="exampleFormControlInput1" value="{{$data->NoSekolah}}" required>
                      @error('NoSekolah')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>   
                </div>
                <div class="mb-3">
                  <div class="row">
                    <div class="col-auto"><h4>Informasi Tentang Keluarga</h4></div>
                    <div class="col"><hr></div>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="row">
                    <div class="col-sm-6">
                      <label for="exampleFormControlInput1" class="form-label">Nama Ayah</label>
                      <input type="text" name="NamaAyah" class="form-control" value="{{$data->NamaAyah}}" id="exampleFormControlInput1">
                      @error('NamaAyah')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-sm-6">
                      <label for="exampleFormControlInput1" class="form-label">NIK Ayah</label>
                      <input type="text" name="NIKAyah" class="form-control" value="{{$data->NIKAyah}}" id="exampleFormControlInput1">
                      @error('NIKAyah')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="row">
                    <div class="col-sm-6">
                      <label for="exampleFormControlInput1" class="form-label">Nama Ibu</label>
                      <input type="text" name="NamaIbu" class="form-control" value="{{$data->NamaIbu}}" id="exampleFormControlInput1">
                      @error('NamaIbu')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-sm-6">
                      <label for="exampleFormControlInput1" class="form-label">NIK Ibu</label>
                      <input type="text" name="NIKIbu" class="form-control" value="{{$data->NIKIbu}}" id="exampleFormControlInput1">
                      @error('NIKIbu')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">No Orangtua</label>
                  <input class="form-control" name="NoOrtu" id="exampleFormControlTextarea1"  value="{{$data->NoOrtu}}" required>
                  @error('NoOrtu')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label for="exampleFormControlInput1" class="form-label">Alamat Orangtua</label>
                  <textarea class="form-control" name="AlamatOrtu" id="exampleFormControlTextarea1" rows="2" required>{{$data->AlamatOrtu}}</textarea>
                  @error('AlamatOrtu')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <div class="row">
                    <div class="col-auto"><h4>Data Anak</h4></div>
                    <div class="col"><hr></div>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="row">
                    <div class="col-sm-6">
                      <label for="exampleFormControlInput1" class="form-label">Status</label>
                      <select class="form-select" name="Status" aria-label="Default select example">
                        <option selected>{{$data->Status}}</option>
                        <option value="Yatim">Yatim</option>
                        <option value="Piatu">Piatu</option>
                        <option value="Yatim Piatu">Yatim Piatu</option>
                        <option value="Dhuafa">Dhuafa</option>
                      </select>
                      @error('Status')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-sm-6">
                      <label for="date">Tanggal Masuk</label>
                      <div class="input-group date" id="datepicker2">
                          <input type="text" name="TanggalMasuk" class="form-control" value="{{$data->TanggalMasuk}}" required>
                          <span class="input-group-append">
                              <span class="input-group-text bg-white d-block">
                                  <i class="fa fa-calendar"></i>
                              </span>
                          </span>
                          @error('TanggalMasuk')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                    </div>
                  </div>   
                </div>
                <div class="mb-3">
                  <div class="row">
                    <div class="col-sm-6">
                      <label for="exampleFormControlInput1" class="form-label">NIK</label>
                      <input type="text" name="NIK" class="form-control" id="exampleFormControlInput1" value="{{$data->NIK}}" required>
                      @error('NIK')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-sm-6">
                      <label for="exampleFormControlInput1" class="form-label">No. KK</label>
                      <input type="text" name="NoKK" class="form-control" id="exampleFormControlInput1" value="{{$data->NoKK}}" required>
                      @error('NoKK')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="mb-4">
                  <div class="row">
                    <div class="col-sm-6">
                      <label for="exampleFormControlInput1" class="form-label">NISN</label>
                      <input type="text" name="NISN" class="form-control" value="{{$data->NISN}}" id="exampleFormControlInput1" required>
                      @error('NISN')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-sm-6">
                      <label for="exampleFormControlInput1" class="form-label">No Akta</label>
                      <input type="text" name="NoAkta" class="form-control" value="{{$data->NoAkta}}" id="exampleFormControlInput1" required>
                      @error('NoAkta')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                
                <div class="mb-3">
                  <div class="row">
                    <div class="col-auto"><h4>Hubungan (Kontak)</h4></div>
                    <div class="col"><hr></div>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="row">
                    <div class="col-sm-6">
                      <label for="exampleFormControlInput1" class="form-label">Penanggungjawab</label>
                      <input type="text" name="Penanggungjawab" class="form-control" value="{{$data->Penanggungjawab}}" id="exampleFormControlInput1" required>
                      @error('Penanggungjawab')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-sm-6">
                      <label for="exampleFormControlInput1" class="form-label">No. Telp yang dapat dihubungi</label>
                      <input type="text" name="NoKontak" class="form-control" value="{{$data->NoKontak}}" id="exampleFormControlInput1" required>
                      @error('NoKontak')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="mb-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <label for="exampleFormControlInput1" class="form-label">Dimana Tinggalnya?</label>
                      <input type="text" name="Tinggal" class="form-control" value="{{$data->Tinggal}}" id="exampleFormControlInput1" required>
                      @error('Tinggal')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    
                  </div>
                </div>

                <div class="mb-3">
                  <div class="row">
                    <div class="col-auto"><h4>Upload File</h4></div>
                    <div class="col"><hr></div>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="image">
                    <label><h6>Edit Foto</h6></label>
                    <div class="mb-1">
                      <img src="{{asset('images/foto/'.$data->Foto)}}" id="output" alt="" style="width: 250px;;"/>
                    </div>
                    <input type="file" id="Foto" name="Foto" class="form-control" src="{{public_path('images/foto/'.$data->Foto)}}">
                    @error('Foto')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <text class="text-muted" style="font-size:10.0pt">*Minimal upload Foto sebesar 500 KB</text>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="image">
                    <label><h6>Edit Scan KK</h6></label>
                    <div class="mb-1">
                      <img src="{{asset('images/kk/'.$data->ScanKK)}}" id="output1" alt="" style="width: 250px;;"/>
                    </div>
                    <input type="file" id="ScanKK" name="ScanKK" class="form-control" src="{{public_path('images/kk/'.$data->ScanKK)}}">
                    @error('ScanKK')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <text class="text-muted" style="font-size:10.0pt">*Minimal upload Scan KK sebesar 500 KB</text>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="image">
                    <label><h6>Edit Scan Aktalahir</h6></label>
                    <div class="mb-1">
                      <img src="{{asset('images/aktalahir/'.$data->ScanAkta)}}" id="output2" alt="" style="width: 250px;;"/>
                    </div>
                    <input type="file" id="ScanAkta" name="ScanAkta" class="form-control" src="{{public_path('images/aktalahir/'.$data->ScanAkta)}}">
                    @error('ScanAkta')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <text class="text-muted" style="font-size:10.0pt">*Minimal upload Scan Aktalahir sebesar 500 KB</text>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="image" >
                    <label><h6>Edit Scan KIS/BPJS</h6></label>
                    <div class="mb-1">
                      <img src="{{asset('images/kisbpjs/'.$data->ScanKISBPJS)}}" id="output3" alt="" style="width: 250px;;"/>
                    </div>  
                    <input type="file" id="ScanKISBPJS" name="ScanKISBPJS" class="form-control" src="{{public_path('images/kisbpjs/'.$data->ScanKISBPJS)}}">
                    @error('ScanKISBPJS')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <text class="text-muted" style="font-size:10.0pt">*Minimal upload Scan KIS/BPJS sebesar 500 KB</text>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="image" >
                    <label><h6>Edit Scan KIP</h6></label>
                    <div class="mb-1">
                      <img src="{{asset('images/kip/'.$data->ScanKIP)}}" id="output4" alt="" style="width: 250px;;"/>
                    </div>  
                    <input type="file" id="ScanKIP" name="ScanKIP" class="form-control" src="{{public_path('images/kip/'.$data->ScanKIP)}}">
                    @error('ScanKIP')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <text class="text-muted" style="font-size:10.0pt">*Minimal upload Scan KIP sebesar 500 KB</text>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="image" >
                    <label><h6>Edit Scan KMS</h6></label>
                    <div class="mb-1">
                      <img src="{{asset('images/kms/'.$data->ScanKMS)}}" id="output5" alt="" style="width: 250px;;"/>
                    </div>  
                    <input type="file" id="ScanKMS" name="ScanKMS" class="form-control" src="{{public_path('images/kms/'.$data->ScanKMS)}}">
                    @error('ScanKMS')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <text class="text-muted" style="font-size:10.0pt">*Minimal upload Scan KMS sebesar 500 KB</text>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="image" >
                    <label><h6>Edit Scan KIA/KTP</h6></label>
                    <div class="mb-1">
                      <img src="{{asset('images/kiaktp/'.$data->ScanKIAKTP)}}" id="output6" alt="" style="width: 250px;;"/>
                    </div>  
                    <input type="file" id="ScanKIAKTP" name="ScanKIAKTP" class="form-control" src="{{public_path('images/kiaktp/'.$data->ScanKIAKTP)}}">
                    @error('ScanKIAKTP')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <text class="text-muted" style="font-size:10.0pt">*Minimal upload Scan KIA/KTP sebesar 500 KB</text>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="image" >
                    <label><h6>Edit Scan Ijazah SD</h6></label>
                    <div class="mb-1">
                      <img src="{{asset('images/ijazahSD/'.$data->ScanIjazahSD)}}" id="output7" width="250px"/>
                    </div>  
                    <input type="file" id="ScanIjazahSD" name="ScanIjazahSD" class="form-control" src="{{public_path('images/ijazahSD/'.$data->ScanIjazahSD)}}">
                    @error('ScanIjazahSD')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <text class="text-muted" style="font-size:10.0pt">*Minimal upload Scan Ijazah SD sebesar 500 KB</text>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="image" >
                    <label><h6>Upload Scan Ijazah SMP</h6></label>
                    <div class="mb-1">
                      <img src="{{asset('images/ijazahSMP/'.$data->ScanIjazahSMP)}}" id="output8" width="250px"/>
                    </div>  
                    <input type="file" id="ScanIjazahSMP" name="ScanIjazahSMP" class="form-control" src="{{public_path('images/ijazahSMP/'.$data->ScanIjazahSMP)}}">
                    @error('ScanIjazahSMP')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <text class="text-muted" style="font-size:10.0pt">*Minimal upload Scan Ijazah SMP sebesar 500 KB</text>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="image" >
                    <label><h6>Upload Scan Ijazah SMA</h6></label>
                    <div class="mb-1">
                      <img src="{{asset('images/ijazahSMA/'.$data->ScanIjazahSMA)}}" id="output9" width="250px"/>
                    </div>  
                    <input type="file" id="ScanIjazahSMA" name="ScanIjazahSMA" class="form-control" src="{{public_path('images/ijazahSMA/'.$data->ScanIjazahSMA)}}">
                    @error('ScanIjazahSMA')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <text class="text-muted" style="font-size:10.0pt">*Minimal upload Scan Ijazah SMA sebesar 500 KB</text>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="image" >
                    <label><h6>Upload Scan File Sosial</h6></label>
                    <div class="mb-1">
                      <img src="{{asset('images/filesosial/'.$data->ScanFileSosial)}}" id="output10" width="250px"/>
                    </div>  
                    <input type="file" id="ScanFileSosial" name="ScanFileSosial" class="form-control" src="{{public_path('images/filesosial/'.$data->ScanFileSosial)}}">
                    @error('ScanFileSosial')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <text class="text-muted" style="font-size:10.0pt">*Minimal upload Scan File Sosial sebesar 500 KB</text>
                  </div>
                </div>

                <div class="col text-center">
                  <div class="post_button">
                    <button type="submit" class="btn btn-success">Edit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
  
@endsection

@push('scripts')

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript">
        $(function() {
          $('#datepicker').datepicker({
            format: 'yyyy-mm-dd',
        });
          $('#datepicker2').datepicker({
            format: 'yyyy-mm-dd',
          });
        });
    </script>
    <script type="text/javascript">
      $(document).ready(function (e) {   
         $('#Foto').change(function(){
          let reader = new FileReader();
          reader.onload = (e) => { 
            $('#output').attr('src', e.target.result); 
          }
          reader.readAsDataURL(this.files[0]); 
         });
      });
      $(document).ready(function (e) {   
         $('#ScanKK').change(function(){
          let reader = new FileReader();
          reader.onload = (e) => { 
            $('#output1').attr('src', e.target.result); 
          }
          reader.readAsDataURL(this.files[0]); 
         });
      });
      $(document).ready(function (e) {   
         $('#ScanAkta').change(function(){
          let reader = new FileReader();
          reader.onload = (e) => { 
            $('#output2').attr('src', e.target.result); 
          }
          reader.readAsDataURL(this.files[0]); 
         });
      });
      $(document).ready(function (e) {   
         $('#ScanKISBPJS').change(function(){
          let reader = new FileReader();
          reader.onload = (e) => { 
            $('#output3').attr('src', e.target.result); 
          }
          reader.readAsDataURL(this.files[0]); 
         });
      });
      $(document).ready(function (e) {   
         $('#ScanKIP').change(function(){
          let reader = new FileReader();
          reader.onload = (e) => { 
            $('#output4').attr('src', e.target.result); 
          }
          reader.readAsDataURL(this.files[0]); 
         });
      });
      $(document).ready(function (e) {   
         $('#ScanKMS').change(function(){
          let reader = new FileReader();
          reader.onload = (e) => { 
            $('#output5').attr('src', e.target.result); 
          }
          reader.readAsDataURL(this.files[0]); 
         });
      });
      $(document).ready(function (e) {   
         $('#ScanKIAKTP').change(function(){
          let reader = new FileReader();
          reader.onload = (e) => { 
            $('#output6').attr('src', e.target.result); 
          }
          reader.readAsDataURL(this.files[0]); 
         });
      });
      $(document).ready(function (e) {   
         $('#ScanIjazahSD').change(function(){
          let reader = new FileReader();
          reader.onload = (e) => { 
            $('#output7').attr('src', e.target.result); 
          }
          reader.readAsDataURL(this.files[0]); 
         });
      });
      $(document).ready(function (e) {   
         $('#ScanIjazahSMP').change(function(){
          let reader = new FileReader();
          reader.onload = (e) => { 
            $('#output8').attr('src', e.target.result); 
          }
          reader.readAsDataURL(this.files[0]); 
         });
      });
      $(document).ready(function (e) {   
         $('#ScanIjazahSMA').change(function(){
          let reader = new FileReader();
          reader.onload = (e) => { 
            $('#output9').attr('src', e.target.result); 
          }
          reader.readAsDataURL(this.files[0]); 
         });
      });
      $(document).ready(function (e) {   
         $('#ScanFileSosial').change(function(){
          let reader = new FileReader();
          reader.onload = (e) => { 
            $('#output10').attr('src', e.target.result); 
          }
          reader.readAsDataURL(this.files[0]); 
         });
      });
    </script> 
@endpush


