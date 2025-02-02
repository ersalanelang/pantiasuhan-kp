@extends('layout.admin')

@push('css')

@endpush

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Data User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="/datauser">Data User</a></li>
              <li class="breadcrumb-item active">Tambah Data User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container"> 
      <div class="row justify-content-center">
          <div class="register-box ">
            <div class="card card-outline card-primary">
              <div class="card-header text-center">
                <a href="#" class="h4"><img src="{{ asset('template/dist/img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-1 " style="width: 40px;;"><b>  UPT RPA </b>Wiloso Projo</a>
              </div>
              <div class="card-body">
                <p class="login-box-msg">Buat akun untuk mengakses Web</p>

                <form action="/registeruser" method="post">
                  @csrf
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Nama Lengkap">
                    
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                  </div>
                  @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
                  @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                  @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                  <div class="mt-2 mb-3">
                      <button type="submit" class="btn btn-primary btn-block">Buat Akun</button>
                    </div>
                </form>
              </div>
              <!-- /.form-box -->
            </div><!-- /.card -->
          </div>
      </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush
