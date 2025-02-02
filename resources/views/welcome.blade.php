@extends('layout.admin')

@push('css')

  <style>
      th {  
        text-align:center;
      }
      th:nth-child(2) {  
        text-align:left;
      }
      td:nth-child(2) {  
        text-align:left;
      }
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
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-lightblue">
              <div class="inner">
                <h3>{{$jumlahanak}}</h3>

                <p>Anak Asuh</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="/anakasuh" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$jumlahaktif}}<sup style="font-size: 20px"></sup></h3>
                <!-- <h3>{{$jumlahanakperempuan}}<sup style="font-size: 20px">%</sup></h3> -->
                <p>Anak Asuh Aktif</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-check"></i>
              </div>
              <a href="/anakasuh?search=aktif" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-fuchsia">
              <div class="inner">
                <h3>{{$jumlahkeluar}}</h3>

                <p>Anak Asuh Keluar</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-minus"></i>
                
              </div>
              <a href="/anakasuh?search=keluar" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$pekerja}}</h3>

                <p>Pegawai</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-tie"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Data anak Asuh Aktif
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                      <li class="nav-item">
                        <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#line-chart" data-toggle="tab">Bar</a>
                      </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 300px;">
                      <canvas id="lineChart" height="300" style="height: 300px;"></canvas>
                   </div>
                   <div class="chart tab-pane" id="line-chart"
                       style="position: relative; height: 300px;">
                      <canvas id="barChart" height="300" style="height: 300px;"></canvas>
                   </div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Data anak Asuh Keluar
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                      <li class="nav-item">
                        <a class="nav-link active" href="#revenue-chart2" data-toggle="tab">Area</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#line-chart2" data-toggle="tab">Bar</a>
                      </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart2"
                       style="position: relative; height: 300px;">
                      <canvas id="lineChart2" height="300" style="height: 300px;"></canvas>
                   </div>
                   <div class="chart tab-pane" id="line-chart2"
                       style="position: relative; height: 300px;">
                      <canvas id="barChart2" height="300" style="height: 300px;"></canvas>
                   </div>
                </div>
              </div><!-- /.card-body -->
            </div>  
            <!-- USERS LIST -->    
            <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Berulang Tahun Bulan ini</h3>

                    <div class="card-tools">
                      <span class="badge badge-danger">{{$data->count()}} Orang</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                    @foreach ($data as $row)
                      <li>
                        <img src="{{asset('images/foto/'.$row->Foto)}}" alt="User Image" style="width: 50px;height: 50px;">
                        <a class="users-list-name" href="#">{{$row->Nama}}</a>
                        <span class="users-list-date">{{ \Carbon\Carbon::parse($row->TanggalLahir)->format('d M')}}</span>
                      </li>
                    @endforeach
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="/anakasuh">View All Users</a>
                  </div>
                  <!-- /.card-footer -->
            </div>            
            <!--/.card -->
          </section>
          <!-- /.Left col -->

          <section class="col-lg-5 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Graph Anak Asuh
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#sales-chart" data-toggle="tab">Status</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#pie-chart" data-toggle="tab">Jenis Kelamin</a>
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <div class="chart tab-pane active" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="donutChart" height="300" style="height: 300px;"></canvas>
                  </div>
                  <div class="chart tab-pane " id="pie-chart" style="position: relative; height: 300px;">
                    <canvas id="pieChart" height="300" style="height: 300px;"></canvas>
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card ">
                  <div class="card-header border-transparent">
                    <h3 class="card-title">Data Anak Masuk Terakhir</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table m-0">
                        <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama</th>
                          <th>Status</th>
                          <th>Tanggal Masuk</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($dataanak as $index => $row)
                        <tr>
                          <td>{{ $index + 1 }}</td>
                          <td>{{$row -> Nama}}</td>
                          <td>{{$row -> Status}}</td>
                          <td>{{ \Carbon\Carbon::parse($row->TanggalMasuk)->locale('id')->format('d-m-Y')}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer clearfix">
                    <!-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a> -->
                    <a href="/anakasuh" class="btn btn-sm btn-secondary float-right">Lihat Data Anak Asuh</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
            </div>
          </section>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection


@push('scripts')
<script type="text/javascript">
	var _ydata=JSON.parse('{!! json_encode($months) !!}');
	var _y2data=JSON.parse('{!! json_encode($months2) !!}');
	var _xdata=JSON.parse('{!! json_encode($monthaktif) !!}');
	var _x2data=JSON.parse('{!! json_encode($monthkeluar) !!}');
</script>
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    // var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    // var areaChartData = {
    //   labels  : _ydata,
    //   datasets: [
    //     {
    //       label               : 'Anak Asuh Masuk ',
    //       backgroundColor     : 'rgba(60,141,188,0.9)',
    //       borderColor         : 'rgba(60,141,188,0.8)',
    //       pointRadius          : false,
    //       pointColor          : '#3b8bba',
    //       pointStrokeColor    : 'rgba(60,141,188,1)',
    //       pointHighlightFill  : '#fff',
    //       pointHighlightStroke: 'rgba(60,141,188,1)',
    //       data                : _xdata,
    //     },
    //     {
    //       label               : 'Anak Asuh Keluar',
    //       backgroundColor     : 'rgba(210, 214, 222, 1)',
    //       borderColor         : 'rgba(210, 214, 222, 1)',
    //       pointRadius         : false,
    //       pointColor          : 'rgba(210, 214, 222, 1)',
    //       pointStrokeColor    : '#c1c7d1',
    //       pointHighlightFill  : '#fff',
    //       pointHighlightStroke: 'rgba(220,220,220,1)',
    //       data                : _x2data,
    //     },
    //   ]
    // }

    // var areaChartOptions = {
    //   maintainAspectRatio : false,
    //   responsive : true,
    //   legend: {
    //     display: false
    //   },
    //   scales: {
    //     xAxes: [{
    //       gridLines : {
    //         display : false,
    //       }
    //     }],
    //     yAxes: [{
    //       gridLines : {
    //         display : false,
    //       },
    //       ticks: {
    //             beginAtZero: true,
    //       }
    //     }]
    //   }
    // }

    // // This will get the first returned node in the jQuery collection.
    // new Chart(areaChartCanvas, {
    //   type: 'line',
    //   data: areaChartData,
    //   options: areaChartOptions
    // })

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')

    var lineChartData = {
      labels  : _ydata,
      datasets: [
        {
          label               : 'Anak Asuh Masuk ',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : _xdata,
        }
      ]
    }

    var lineChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          },
          ticks: {
                beginAtZero: true,
          }
        }]
      }
    }
    
    lineChartData.datasets[0].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas2 = $('#lineChart2').get(0).getContext('2d')

    var lineChartData2 = {
      labels  : _y2data,
      datasets: [
        {
          label               : 'Anak Asuh Keluar',
          backgroundColor     : 'rgba(60,141,19,0.9)',
          borderColor         : 'rgba(60,141,19,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,19,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,19,1)',
          data                : _x2data,
        }
      ]
    }

    var lineChartOptions2 = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          },
          ticks: {
                beginAtZero: true,
          }
        }]
      }
    }
    
    lineChartData2.datasets[0].fill = false;
    lineChartOptions2.datasetFill = false

    var lineChart2 = new Chart(lineChartCanvas2, {
      type: 'line',
      data: lineChartData2,
      options: lineChartOptions2
    })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Yatim',
          'Piatu',
          'Yatim Piatu',
          'Dhuafa',
      ],
      datasets: [
        {
          data: [{{$statusy}},{{$statusp}},{{$statusyp}},{{$statusd}}],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, lineChartData)

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false,
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          },
          ticks: {
                beginAtZero: true,
          }
        }]
      }
    }
    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    //-------------
    //- BAR CHART2 -
    //-------------
    var barChartCanvas2 = $('#barChart2').get(0).getContext('2d')
    var barChartData2 = $.extend(true, {}, lineChartData2)

    var barChartOptions2 = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false,
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          },
          ticks: {
                beginAtZero: true,
          }
        }]
      }
    }

    new Chart(barChartCanvas2, {
      type: 'bar',
      data: barChartData2,
      options: barChartOptions2
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = {
      labels: [
          'Laki-laki',
          'Perempuan',
      ],
      datasets: [
        {
          data: [{{$jumlahanaklaki}},{{$jumlahanakperempuan}}],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

  })
</script>
@endpush


