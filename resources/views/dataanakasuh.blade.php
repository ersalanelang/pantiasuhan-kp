@extends('layout.admin')

@push('css')
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- sweatalert CSS
  <link rel="stylesheet" href="sweetalert2.min.css">
  <script src="sweetalert2.min.js"></script> -->

  <!-- toastr css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Date picker css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css')}}">
  
  <style>
      /* .setWidth{
          max-width:100px;
      }
      .concat div {
          overflow: hidden;
          -ms-text-overflow: ellipsis;
          -o-text-overflow: ellipsis;
          text-overflow: ellipsis;
          white-space: nowrap;
          width: inherit;
      } */
      .headcol {
          position: absolute;
          width: 5em;
          left: 0;
          top: auto;
          border-top-width: 1px;
          /*only relevant for first row*/
          margin-top: -1px;
          /*compensate for top border*/
      }
      th {  
        text-align:center;
      }
      td:nth-child(2) {  
        text-align:left;
      }
      /* td:nth-child(10) {  
        width: 200%;  table-layout: auto;
      } */
      td{
          overflow: hidden;
          max-width: 150px;
          max-height: 150px;
          word-wrap: break-word;
          text-align:center;
          /* margin: auto; */     
          /* white-space: nowrap;    */
      }
  </style>
@endpush

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Anak Asuh</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Anak Asuh</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="mb-3">
          <div class="row">
              <div class="col-sm-6">
                @if(Auth::user()->role == 'admin' || Auth::user()->role == 'operator')
                  <a href="/tambahanak" class="btn btn-success">Tambah +</a>
                @endif
                  <!-- <a href="/exportpdf" class="btn btn-secondary">Export PDF</a> -->
                  <a class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                      Cetak PDF
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <li><a class="dropdown-item" target="_blank" href="/exportpdf">Cetak Semua Data</a></li>
                      <li><a class="dropdown-item" href="/cetak-pertanggal">Cetak per Tanggal</a></li>
                    </ul>
                  </a>
                  <a class="dropdown">
                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                      Cetak Excel
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <li><a class="dropdown-item" target="_blank" href="/exportexcel">Cetak Semua Data</a></li>
                      <li><a class="dropdown-item" href="/cetak-pertanggal">Cetak per Tanggal</a></li>
                    </ul>
                  </a>
              </div>
              <div class="col-sm-6">  
                  <form action="/anakasuh" method="GET">    
                      <div class="row">
                          <div class="input-group">
                              <input type="text" name="search" class="form-control" placeholder="Cari nama, status, kategori, dll" aria-describedby="passwordHelpBlock">               
                                  <span class="input-group-text bg-white d-block">
                              <i class="fa fa-search" aria-hidden="true"></i>
                              </span>  
                          </div>
                      </div>
                  </form>
              </div>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row  ">
          <div class="col-12">
            <!-- <div class="table-wrapper" style="width: 100%"> -->
            <div class="card card-body ">
              <div style="overflow-x: auto;">
                <table id="example2" class="table table-striped table-bordered table-hover table-responsive " style="width: 110%; display: table; table-layout: auto;">
                <!-- <table class="table table-striped table-bordered table-hover table-responsive " style="width: 2000px; display: table; table-layout: auto;"> kalo table nya banyak -->
                  <thead>
                    <tr>
                      <th scope="col" >#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Foto</th>
                      <th scope="col">Tanggal lahir</th>

                      <!-- <th scope="col">Agama</th> -->
                      <th scope="col">Tempat lahir</th>
                      <th scope="col">Jenis Kelamin</th>
                      <!-- <th scope="col">Pendidikan</th> -->
                      <th scope="col">Status</th>
                      <th scope="col">TanggalMasuk</th>
                      <th scope="col">Kategori</th>
                      <!-- <th scope="col">TanggalMasuk</th> -->
                      <!-- <th scope="col">NIK</th>
                      <th scope="col">No. KK</th>
                      <th scope="col">Nama Wali</th>
                      <th scope="col">Status Wali</th>
                      <th scope="col">Alamat Wali</th> -->
                      <!-- <th scope="col">Scan KK</th> -->
                      @if(Auth::user()->role == 'admin' || Auth::user()->role == 'operator')
                        <th scope="col">Aksi</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $index => $row)
                      <tr>
                        <td scope="row"><b>{{ $index + $data->firstitem() }}</b></td>
                        <td ><a href="/detailanak/{{$row->id}}">{{$row -> Nama}}</a></td>
                        <td>
                          <img src="{{asset('images/foto/'.$row->Foto)}}" alt="" style="width: 70px; height: 83px;"/>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($row->TanggalLahir)->locale('id')->format('d-m-Y')}}</td>
                        <td>{{$row -> TempatLahir}}</td>
                        <td>{{$row -> JenisKelamin}}</td>
                        <!-- <td>{{$row -> Pendidikan}}</td> -->
                        <td>{{$row -> Status}}</td>
                        <td>{{ \Carbon\Carbon::parse($row->TanggalMasuk)->format('d-m-Y')}}</td>
                        @if($row->id_kategori == '1')
                          <td><h5><span class="badge rounded-pill bg-info">{{$row -> kategoris->Kategori}}</span></h5></td>
                        @endif
                        @if($row->id_kategori == '2')
                          <td><h5><span class="badge rounded-pill bg-danger">{{$row -> kategoris->Kategori}}</span><h5></td>
                        @endif        
                        <!-- <td>{{$row -> NIK}}</td>
                        <td>{{$row -> NoKK}}</td>
                        <td>{{$row -> NamaWali}}</td>
                        <td>{{$row -> StatusWali}}</td>
                        <td>{{$row -> AlamatWali}}</td> -->
                        <!-- <td>
                          <a href="{{asset('images/kk/'.$row->ScanKK)}}" target="_blank" rel="noopener noreferrer">LihatGambar</a>
                        </td> -->
                        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'operator')
                        <td>
                          <div class="row">
                            @if($row->id_kategori == '1')
                              <div class="col-md-4" >
                                <a href="/tampilkandata/{{$row->id}}" class="btn btn-warning"><i class="fas fa-pen fa-xs"></i></a>
                              </div>
                              <div class="col-md-4">
                                <form action="/updatekategori/{{$row->id}}" id="submitForm" method="POST">
                                  @csrf
                                  <div class="post_button">
                                    <button type="button" id="btn-ok" class="btn btn-primary"><i class="fas fa-user-cog fa-xs"></i></button>
                                  </div>
                                </form> 
                              </div>
                            @endif
                            <div class="col-md-4">
                              <a href="#" class="btn btn-danger delete" data-id="{{$row->id}}" data-name="{{$row->Nama}}"><i class="fas fa-trash fa-xs"></i></a>
                            </div>
                          </div>
                        </td>
                        @endif
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $data->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
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

    <!-- jQuery Core -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- sweatalert CDN/Jquery -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- toastr -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- jQuery
    <script src="{{ asset('template/plugins/jquery/jquery.min.js')}}"></script> -->

    <!-- Bootstrap 4 -->
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('template/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{ asset('template/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{ asset('template/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    
    <!-- button delete -->
    <script>
      $('.delete').click(function(){
        var anakasuhId = $(this).attr('data-id');
        var anakasuhNama = $(this).attr('data-name');
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
          title: 'Yakin ingin Hapus data?',
          text: "Kami akan menghapus data Anak asuh dengan nama "+anakasuhNama+" ",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Ya, Hapus',
          cancelButtonText: 'Tidak!',
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = "/deletedata/"+anakasuhId+""
            swalWithBootstrapButtons.fire(
              'Terhapus!',
              'Data berhasil dihapus',
              'success'
            )
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              'Batal!',
              'Data tidak jadi dihapus',
              'error'
            )
          }
        })
      })
    </script>
    <!-- button keluar -->
    <script>
      $('form #btn-ok').click(function(){
        let $form = $(this).closest('form');

        Swal.fire({
          title: 'Ubah Kategori',
          text: "Yakin ingin ubah kategori menjadi Keluar?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, ubah!'
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire(
              'Dirubah',
              'Kategori telah di perbarui',
              'success'
            )
            $form.submit();
          }
        })
      })
    </script>
    <!-- toastr notifikasi -->
    <script>
      @if (Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
      @endif
      @if (Session::has('failed'))
        toastr.error('{{ Session::get('failed') }}');
      @endif
    </script> 
    <script>
      $(function () {
        // $("#example1").DataTable({
        //   "responsive": true, "lengthChange": false, "autoWidth": false,
        //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
          // show 5,10,100
          "paging": false,
          "lengthChange": false,  
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": false,
        });
      });
    </script>

@endpush
