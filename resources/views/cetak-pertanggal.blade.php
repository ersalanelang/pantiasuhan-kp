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
            <h1 class="m-0">Print PDF & Excel - Pertanggal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="/anakasuh">Anak Asuh</a></li>
              <li class="breadcrumb-item active">Cetak per Tanggal</li>
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
                <div class="mb-3">
                  <div class="row">      
                    <div class="col-sm-3">
                        <label for="date" class="col-form-label">Tanggal Awal</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="date" name="tglAwal" id="tglAwal" class="form-control"/> 
                    </div>
                  </div> 
                </div>
                <div class="mb-3">
                  <div class="row">      
                    <div class="col-sm-3">
                        <label for="date" class="col-form-label">Tanggal Akhir</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="date" name="tglAkhir" id="tglAkhir" class="form-control"/> 
                    </div>
                  </div> 
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Pilih Type</label>
                    <select class="form-select" name="type" id="type" aria-label="Default select example" required>
                    <option value="" selected>Pilih</option>
                    <option value="EXCEL">EXCEL</option>
                    <option value="PDF">PDF</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Cetak Berdasarkan</label>
                    <select class="form-select" name="cetak" id="cetak" aria-label="Default select example" required>
                    <option value="" selected>Pilih</option>
                    <option value="Tanggal Lahir">Tanggal Lahir</option>
                    <option value="Tanggal Masuk">Tanggal Masuk</option>
                    <option value="Tanggal Keluar">Tanggal Keluar</option>
                  </select>
                </div>
                <div class=" text-center mb-3"> 
                    <a href="" onclick="this.href='/cetak-anak-pertanggal/' + document.getElementById('type').value + '/' + document.getElementById('cetak').value + '/' + document.getElementById('tglAwal').value
                    + '/' + document.getElementById('tglAkhir').value" target="_blank" class="col-md-12 btn btn-primary">Cetak  <i class="fa fa-print"></i></a>
                </div>
                <!-- <div class=" text-center mb-3"> 
                  <div data-parent="tglmasuk">
                    <a href="" onclick="this.href='/cetak-anak-pertanggal/' + document.getElementById('tglAwal').value
                    + '/' + document.getElementById('tglAkhir').value" target="_blank" class="col-md-12 btn btn-primary">Cetak  <i class="fa fa-print"></i></a>
                  </div>  
                </div>
                <div class=" text-center mb-3"> 
                  <div data-parent="tglkeluar">
                    <a href="" onclick="this.href='/cetak-anak-pertanggal/' + document.getElementById('tglAwal').value
                    + '/' + document.getElementById('tglAkhir').value" target="_blank" class="col-md-12 btn btn-primary">Cetak  <i class="fa fa-print"></i></a>
                  </div>  
                </div> -->
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
@endpush

