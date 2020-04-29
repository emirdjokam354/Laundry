<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Detail Transaksi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('AdminLte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('AdminLte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('AdminLte/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLte/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('AdminLte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('AdminLte/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('AdminLte/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   
</head>
<body class="hold-transition sidebar-mini layout-fixed">
   <style>
    .cari{
      float: right;
            
    }
    
    .panel-border.panel-primary 
    {
    border-color: #1e88e5 !important;
    
    }
    .panel-border  {
    background-color: #ffffff;
    border-top: 3px solid #ccc !important;
    border-radius: 3px;
    padding: 10px 20px 0px;
}

#trash{
  padding:2px; border:1px solid red; margin-left:10px; background-color:red; color:#fff
  }


  </style>
<div class="wrapper">

  <!-- Navbar -->
    @include('management/navbar');
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @include('transaksi/sidebar');
  {{-- sidebar end --}}

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Detail Transaksi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Detail Transaksi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
     <section class="content">
      <div class="container-fluid">

         @if(session('error'))
            <div class="alert alert-error">
              {{ session('error') }}
            </div>
            @endif

            @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Perhatikan</strong>
              <br/>
              <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
              </ul>
            </div>
            @endif
        <!-- Small boxes (Stat box) -->
        <div class="row mt-4 p-3">
          <div class="col-lg col">
            <!-- small box -->
            <div class="card panel-border panel-primary">
                <p class="card-header">
                    <i class="fas fa-user-edit" style="color:#2F63C7;"></i><label style="margin-left:5px;color:#2F63C7;">Detail Transaksi</label> 
                </p>
                <div class="card-body">
                    @foreach ($transaksi as $row)                        
                    <form action="/transaksi/detail" method="post" enctype="multipart/form-data">
                         @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        @csrf
                        <input type="hidden" name="id" value="{{$row->id}}">
                        <input type="hidden" name="id_transaksi" value="{{$row->transaksi_id}}">
                        <div class="form-group row">
                            <label for="kd_invoice" class="col-sm-2 col-form-label">No.Invoice</label>
                            <div class="col-sm-10">
                            <input type="text" required class="form-control" value="{{$row->kode_invoice }}" readonly  id="kd_invoice">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_pel" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                            <div class="col-sm-10">
                            <input type="text" required class="form-control" readonly value="{{$row->pelanggan->nama }}" readonly  id="nama_pel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                            <input type="text" required class="form-control" readonly value="{{$row->pelanggan->alamat }}" readonly  id="alamat">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tlp" class="col-sm-2 col-form-label">Telepon</label>
                            <div class="col-sm-10">
                            <input type="text" required class="form-control" readonly value="{{$row->pelanggan->tlp }}" readonly  id="tlp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis" class="col-sm-2 col-form-label">Status Pemesanan</label>
                            <div class="col-sm-10">
                            <select name="status" required id="jenis" class="form-control">

                            <option>Pilih Status Pemesanan</option>
                            @if ($row->status == 'baru')
                            <option {{ old('status', $row->status) == "baru" ?
                            'selected' : '' }}
                            value="baru">Baru</option>
                            <option {{ old('status', $row->status) == "proses" ?
                            'selected' : '' }} 
                            value="proses">Proses</option>
                            <option {{ old('status', $row->status) == "selesai" ?
                            'selected' : '' }} 
                            value="selesai">Selesai</option>
                            <option {{ old('status', $row->status) == "diambil" ?
                            'selected' : '' }} 
                            value="diambil">Diambil</option> 

                            @elseif($row->status == 'proses')
                            <option {{ old('status', $row->status) == "proses" ?
                            'selected' : '' }} 
                            value="proses">Proses</option>
                            <option {{ old('status', $row->status) == "selesai" ?
                            'selected' : '' }} 
                            value="selesai">Selesai</option>
                            <option {{ old('status', $row->status) == "diambil" ?
                            'selected' : '' }} 
                            value="diambil">Diambil</option>

                            @elseif($row->status == 'selesai')
                            <option {{ old('status', $row->status) == "selesai" ?
                            'selected' : '' }} 
                            value="selesai">Selesai</option>
                            <option {{ old('status', $row->status) == "diambil" ?
                            'selected' : '' }} 
                            value="diambil">Diambil</option>

                            @elseif($row->status == 'diambil')
                            <option {{ old('status', $row->status) == "diambil" ?
                            'selected' : '' }} 
                            value="diambil">Diambil</option>
                            @endif
                            
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis" class="col-sm-2 col-form-label">Status Pembayaran</label>
                            <div class="col-sm-10"> 
                            <select name="dibayar" required id="jenis" class="form-control">
                              <option value="">Pilih Status Pembayaran</option>
                              @if ($row->dibayar == 'belum_dibayar')
                               <option {{ old('dibayar', $row->dibayar) == "belum_dibayar" ? 
                              'selected' : '' }} 
                                value="belum_dibayar">Belum Dibayar</option>
                              <option {{ old('dibayar', $row->dibayar) == "sudah_dibayar" ?
                              'selected' : '' }} value="sudah_dibayar">Sudah Dibayar</option>   
                              @elseif($row->dibayar == 'sudah_dibayar')
                                <option {{ old('dibayar', $row->dibayar) == "sudah_dibayar" ?
                              'selected' : '' }} value="sudah_dibayar">Sudah Dibayar</option>
                              @endif
                            
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputTgl" class="col-sm-2 col-form-label">Tanggal Ambil</label>
                            <div class="col-sm-10">
                            <input type="date"  name="batas_waktu" readonly value="{{ old($row->batas_waktu, date('Y-m-d'))}}" class="form-control" id="inputTgl">
                            </div>
                        </div>
                        
                 
                  <table class="table table-striped border mt-5 text-center">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Tgl Transaksi</th>
                          <th scope="col">Paket Laundry</th>
                          <th scope="col">Berat Cucian</th>
                          <th scope="col">Harga/Kg</th>
                          {{-- <th scope="col">Keterangan</th> --}}
                          <th scope="keterangan">Subtotal</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>{{ $row->tgl }}</td>
                          @foreach ($transaksi as $data)
                           <td>{{ $data->paket->nm_paket }}</td>   
                          <td>{{ $data->qty }}</td>
                          <td>{{ $data->paket->harga }}</td>
                          {{-- <td>{{ $data->keterangan }}</td>  --}}
                          <td>@currency($data->paket['harga'] * $data['qty'])</td>
                          
                        </tr>
                        <tr>
                          <th scope="row" colspan="4" style="padding-left:200px;font-size:15px; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;background-color:#1e88e5;color:white">Total Pesanan</th>
                          <td></td>
                          <td>@currency($data->paket['harga'] * $data['qty'])</td>
                        </tr>
                        @endforeach
                      </tbody>
                  </table>    
                  <input type="submit" class="btn btn-primary" style="margin-top:20px;float:left;" value="Proses Order"></input>
                  <a onclick="OpenInNewTab();" type="button" class="btn btn-danger text-white" style="margin-top:20px;margin-left:10px;">Cetak Invoice</a>
/                </form>            
                 @endforeach

                 
                </div>
            </div>
          </div>
        
          <!-- ./col -->
        </div>

        <!-- new row -->
         {{-- <div class="row p-3">
          <div class="col-12">
            <div class="card panel-border panel-primary">
              <div class="card-header">
                <h3 class="card-title">Data Detail Transaksi</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tgl Tranasaksi</th>
                      <th>Paket Laundry</th>
                      <th>Kuantitas</th>
                      <th>Berat Cucian</th>
                      <th>Keterangan</th>
                      <th>Harga/Kg</th>
                      <th>Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-success">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>219</td>
                      <td>Alexander Pierce</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-warning">Pending</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div> --}}
        
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.2
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('AdminLte/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('AdminLte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('AdminLte/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('AdminLte/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('AdminLte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('AdminLte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('AdminLte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('AdminLte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('AdminLte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('AdminLte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('AdminLte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('AdminLte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLte/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('AdminLte/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('AdminLte/dist/js/demo.js')}}"></script>
<script>
  function readURL(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e){
        $('#image_upload').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#inputFile").change(function () {
    readURL(this);
  });

  function OpenInNewTab(url) {
    var win = window.open('/transaksi/kwitansi/{{$row->kode_invoice}}');
    win.focus();
  }
</script>
<script type="text/javascript" src="js/main.js"></script>
<script src="js/jquery.js"></script>
</body>
</html>
