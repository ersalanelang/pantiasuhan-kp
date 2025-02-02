@extends('layout.admin')

@push('css')
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css')}}">
@endpush

@section('content')

<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="/anakasuh">Anak Asuh</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-md-2">
            </div> -->
            <div class="col-md-4">
                <!-- Profile Image -->
                <div class="card card-dark card-outline">
                  <div class="card-body box-profile">
                      <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                            src="{{asset('images/foto/'.$data->Foto)}}"
                            alt="User profile picture"
                            style="width: 150px; height:150px;">
                      </div>
                      <h3 class="profile-username text-center">{{$data->Nama}}</h3>
                      @if($data->id_kategori == '1')
                      <div class="text-center">
                        <h5><span class="badge rounded-pill bg-info ">{{$data -> kategoris->Kategori}}</span></h5>
                      </div>
                      @endif
                      @if($data->id_kategori == '2')
                      <div class="text-center">
                        <h5><span class="badge rounded-pill bg-danger ">{{$data -> kategoris->Kategori}}</span></h5>
                      </div>
                      @endif  
                      <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item">
                              <b>Usia</b> <a class="float-right text-muted">{{$data->age}} Tahun</a>
                          </li>
                          <li class="list-group-item">
                              <b>Tanggal Lahir</b> <a class="float-right text-muted"><td>{{ \Carbon\Carbon::parse($data->TanggalLahir)->format('d-m-Y')}}</td></a>
                          </li>
                          <li class="list-group-item">
                              <b>Tempat Lahir</b> <a class="float-right text-muted">{{$data->TempatLahir}}</a>
                          </li>
                          <li class="list-group-item">
                              <b>Asal Daerah/Suku</b> <a class="float-right text-muted">{{$data->Asal}}</a>
                          </li>
                          <li class="list-group-item">
                              <b>Jenis Kelamin</b> <a class="float-right text-muted">{{$data->JenisKelamin}}</a>
                          </li>
                          <li class="list-group-item">
                            <!-- <strong><i class="fas fa-tint mr-2"></i> Golongan Darah</strong>  -->
                            <strong>Golongan Darah</strong> 
                            <a class="float-right text-muted">{{$data->Goldarah}}</a>
                          </li>
                          <li class="list-group-item">
                            <!-- <strong><i class="fas fa-star-and-crescent mr-2"></i> Agama</strong>  -->
                            <strong> Agama</strong> 
                            <a class="float-right text-muted">{{$data->Agama}}</a>
                          </li>
                      </ul>

                      <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                  </div>
                  <!-- /.card-body -->
                </div>
                <div class="card card-dark">
                <div class="card-header">
                  <h3 class="card-title">Detail Scan Anak</h3>
                </div>
                <div class="card-body box-profile">
                  <ul class="list-group list-group-unbordered mb-3">  
                    <li class="list-group-item">
                      <strong><i class="fas fa-paste mr-2"></i>Scan KK</strong> 
                      @if($data->ScanKK != null)
                      <a href="{{asset('images/kk/'.$data->ScanKK)}}" target="_blank" rel="noopener noreferrer" class="float-right">Lihat Scan KK</a>
                      @endif
                    </li>
                    <li class="list-group-item">
                      <strong><i class="fas fa-paste mr-2"></i>Scan Akta</strong> 
                      @if($data->ScanAkta != null)
                      <a href="{{asset('images/aktalahir/'.$data->ScanAkta)}}" target="_blank" rel="noopener noreferrer" class="float-right">Lihat Scan Akta</a>
                      @endif
                    </li>
                    <li class="list-group-item">
                      <strong><i class="fas fa-paste mr-2"></i>Scan KIS/BPJS</strong> 
                      @if($data->ScanKISBPJS != null)
                      <a href="{{asset('images/kisbpjs/'.$data->ScanKISBPJS)}}" target="_blank" rel="noopener noreferrer" class="float-right">Lihat Scan KISBPJS</a>
                      @endif
                    </li>
                    <li class="list-group-item">
                      <strong><i class="fas fa-paste mr-2"></i>Scan KIP</strong> 
                      @if($data->ScanKIP != null)
                      <a href="{{asset('images/kip/'.$data->ScanKIP)}}" target="_blank" rel="noopener noreferrer" class="float-right">Lihat Scan KIP</a>
                      @endif
                    </li>
                    <li class="list-group-item">
                      <strong><i class="fas fa-paste mr-2"></i>Scan KMS</strong> 
                      @if($data->ScanKMS != null)
                      <a href="{{asset('images/kms/'.$data->ScanKMS)}}" target="_blank" rel="noopener noreferrer" class="float-right">Lihat Scan KMS</a>
                      @endif
                    </li>
                    <li class="list-group-item">
                      <strong><i class="fas fa-paste mr-2"></i>Scan KIA/KTP</strong> 
                      @if($data->ScanKIAKTP != null)
                      <a href="{{asset('images/kiaktp/'.$data->ScanKIAKTP)}}" target="_blank" rel="noopener noreferrer" class="float-right">Lihat Scan KIAKTP</a>
                      @endif
                    </li>

                    <li class="list-group-item">
                      <strong><i class="fas fa-paste mr-2"></i>Scan Ijazah SD</strong> 
                      @if($data->ScanIjazahSD != null)
                      <a href="{{asset('images/ijazahSD/'.$data->ScanIjazahSD)}}" target="_blank" rel="noopener noreferrer" class="float-right">Lihat Scan Ijazah SD</a>
                      @endif
                    </li>
                    <li class="list-group-item">
                      <strong><i class="fas fa-paste mr-2"></i>Scan Ijazah SMP</strong> 
                      @if($data->ScanIjazahSMP != null)
                      <a href="{{asset('images/ijazahSMP/'.$data->ScanIjazahSMP)}}" target="_blank" rel="noopener noreferrer" class="float-right">Lihat Scan Ijazah SMP</a>
                      @endif
                    </li>
                    <li class="list-group-item">
                      <strong><i class="fas fa-paste mr-2"></i>Scan Ijazah SMA</strong> 
                      @if($data->ScanIjazahSMA != null)
                      <a href="{{asset('images/ijazahSMA/'.$data->ScanIjazahSMA)}}" target="_blank" rel="noopener noreferrer" class="float-right">Lihat Scan Ijazah SMA</a>
                      @endif
                    </li>
                    <li class="list-group-item">
                      <strong><i class="fas fa-paste mr-2"></i>Scan KIA/KTP</strong> 
                      @if($data->ScanFileSosial != null)
                      <a href="{{asset('images/filesosial/'.$data->ScanFileSosial)}}" target="_blank" rel="noopener noreferrer" class="float-right">Lihat Scan File Sosial</a>
                      @endif
                    </li>
                  </ul>
                  <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                </div>
                <!-- /.card-body -->
              </div>
                <!-- /.card -->
            </div>
            <div class="col-md-8">
              <!-- Profile Image -->  
              <div class="card card-dark">
                <div class="card-header">
                  <h3 class="card-title">Detail Anak Asuh</h3>
                </div>
                <div class="card-body box-profile">
                  <ul class="list-group list-group-unbordered mb-3">  
                    <li class="list-group-item">
                      <strong><i class="fas fa-school mr-2"></i>Nama Sekolah</strong> 
                      <a class="float-right text-muted">{{$data->NamaSekolah}}</a>
                    </li>   
                    <li class="list-group-item">
                      <strong><i class="fas fa-book mr-2"></i> Jenjang Pendidikan</strong> 
                      <a class="float-right text-muted">{{$data->Jenjang}}</a>
                    </li>
                    <li class="list-group-item">
                      <strong><i class="fas fa-book-reader mr-2"></i> Kelas</strong> 
                      <a class="float-right text-muted">{{$data->Kelas}}</a>
                    </li>
                    <li class="list-group-item">
                      <strong><i class="fas fa-phone mr-2"></i> No Sekolah</strong> 
                      <a class="float-right text-muted">{{$data->NoSekolah}}</a>
                    </li>
                    <li class="list-group-item">
                      <strong><i class="fas fa-user mr-2"></i> Nama Ayah</strong> 
                      <a class="float-right text-muted">{{$data->NamaAyah}}</a>
                    </li>
                    <li class="list-group-item">
                      <strong><i class="fas fa-id-card-alt mr-2"></i> NIK Ayah</strong> 
                      <a class="float-right text-muted">{{$data->NIKAyah}}</a>
                    </li>
                    <li class="list-group-item">
                      <strong><i class="fas fa-user mr-2"></i> Nama Ibu</strong> 
                      <a class="float-right text-muted">{{$data->NamaIbu}}</a>
                    </li>
                    <li class="list-group-item">
                      <strong><i class="fas fa-id-card-alt mr-2"></i> NIK Ibu</strong> 
                      <a class="float-right text-muted">{{$data->NIKIbu}}</a>
                    </li>
                    <strong><i class="fa fa-map-marked mr-2 mt-3"></i>  Alawat OrangTua</strong>
                    <p class="text-muted mt-2">
                      {{$data->AlamatOrtu}}
                    </p>
                    <li class="list-group-item">
                      <strong><i class="fas fa-phone mr-2"></i> No Orang Tua</strong> 
                      <a class="float-right text-muted">{{$data->NoOrtu}}</a>
                    </li>
                    <li class="list-group-item">
                      <strong><i class="fas fa-user-check mr-2"></i>Status</strong> 
                      <a class="float-right text-muted">{{$data->Status}}</a>
                    </li>
                    <li class="list-group-item">
                      <strong><i class="far fa-calendar-alt mr-2"></i>Tanggal Masuk</strong> 
                      <a class="float-right text-muted"><td>{{ \Carbon\Carbon::parse($data->TanggalMasuk)->format('d-m-Y')}}</td></a>
                    </li>
                    @if($data->id_kategori == '2')
                    <li class="list-group-item">
                      <strong><i class="far fa-calendar-alt mr-2"></i>Tanggal Keluar</strong> 
                      <a class="float-right text-muted"><td>{{ \Carbon\Carbon::parse($data->TanggalKeluar)->format('d-m-Y')}}</td></a>
                    </li>
                    @endif
                    <li class="list-group-item">
                      <strong><i class="fas fa-id-card-alt mr-2"></i>NIK</strong> 
                      <a class="float-right text-muted">{{$data->NIK}}</a>
                    </li>
                    <li class="list-group-item">
                      <strong><i class="fas fa-id-card mr-2"></i> No. KK</strong> 
                      <a class="float-right text-muted">{{$data->NoKK}}</a>
                    </li>
                    <li class="list-group-item">
                      <strong><i class="fas fa-id-card mr-2"></i> NISN</strong> 
                      <a class="float-right text-muted">{{$data->NISN}}</a>
                    </li>
                    <li class="list-group-item">
                      <strong><i class="fas fa-id-card mr-2"></i> No. Akta</strong> 
                      <a class="float-right text-muted">{{$data->NoAkta}}</a>
                    </li>

                    <li class="list-group-item">
                      <strong>Penanggungjawab</strong> 
                      <a class="float-right text-muted">{{$data->Penanggungjawab}}</a>
                    </li>
                    <li class="list-group-item">
                      <strong>Dimana Tinggalnya?</strong> 
                      <a class="float-right text-muted">{{$data->Tinggal}}</a>
                    </li>
                    <li class="list-group-item">
                      <strong>No. Telp yang dapat dihubungi</strong> 
                      <a class="float-right text-muted">{{$data->NoKontak}}</a>
                    </li>

                  </ul>
                  <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                </div>
                <!-- /.card-body -->
              </div>
            <!-- <div class="col-md-2">
            </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>

@endsection

@push('scripts')

<!-- jQuery -->
<script src="{{ asset('template/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.j')}}s"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template/dist/js/adminlte.min.js')}}"></script>

@endpush