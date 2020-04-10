<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Transaksi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{asset('AdminLte/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('AdminLte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset('AdminLte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('AdminLte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('AdminLte/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('AdminLte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{asset('AdminLte/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLte/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<style>
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
</style>
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
            <h1 class="m-0 text-dark">Transaksi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Transaksi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
     <section class="content">
      <div class="container-fluid">

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert block">
                <button type="button" class="close" data-dismiss="alert"> x </button>
                <strong>{{ $message }}</strong>
            </div>
        @endif    

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
                    <i class="fas fa-user-plus" style="color:#2F63C7;"></i><label style="margin-left:5px;color:#2F63C7;">Tambah Data Transaksi</label> 
                </p>
                <div class="card-body">
                    <form action="/transaksi/store" method="post" enctype="multipart/form-data">
                         @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        @csrf
                         <div class="form-group row">
                            <label for="outlet" class="col-sm-2 col-form-label">Outlet</label>
                            <div class="col-sm-10">
                            <select name="id_outlet" required  id="outlet" class="form-control">
                            <option>Pilih Outlet</option>
                            @foreach ($outlet as $item)
                               <option value="{{ $item->id }}">{{ $item->nama }}</option> 
                            @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="outlet" class="col-sm-2 col-form-label">Pelanggan</label>
                            <div class="col-sm-10">
                            <select name="id_member" required  id="outlet" class="form-control">
                            <option>Pilih Pelanggan</option>
                            @foreach ($pelanggan as $data)
                               <option value="{{ $data->id }}">{{ $data->nama }}</option> 
                            @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputTgl" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                            <div class="col-sm-10">
                            <input type="date" required class="form-control" name="tgl" id="inputTgl">
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="reservationtime" class="col-sm-2 col-form-label">Batas Pembayaran</label>

                            <div class="col-sm-10">
                              <input type="date" name="batas_waktu" class="form-control" id="datetimepicker1">
                            </div>
                          </div>

                         <div class="form-group">
                        <div class="form-group row">
                            <label for="paket" class="col-sm-2 col-form-label">Paket</label>
                            <div class="col-sm-10">
                          <select name="paket" required id="paket" class="form-control">
                            <option>Pilih Paket</option>
                            @foreach ($paket as $pkt)
                            <option value="{{ $pkt->id }}">{{ $pkt->nm_paket }}</option>
                            @endforeach
                          </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="qty" class="col-sm-2 col-form-label">Berat/Kg</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" name="berat" id="qty">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="biaya_tambh" class="col-sm-2 col-form-label">Biaya Tambahan</label>
                            <div class="col-sm-10">
                            <select name="biaya_tambahan" required id="biaya_tambh" class="form-control">
                            <option>Pilih Status Pembayaran</option>
                            <option value="5000">Kurir</option>
                            <option value="0">Tidak Pakai Kurir</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis" class="col-sm-2 col-form-label">Status Pembayaran</label>
                            <div class="col-sm-10">
                            <select name="status_bayar" required id="jenis" class="form-control">
                            <option>Pilih Status Pembayaran</option>
                            <option value="belum_dibayar">Belum Dibayar</option>
                            <option value="sudah_dibayar">Sudah Dibayar</option>
                            </select>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary " style="margin-left:190px;margin-top:20px" value="Tambah"></input>
                        <a href="/transaksi" type="button" class="btn btn-danger" style="margin-top:20px">Kembali</a>
                    </form>
                </div>
            </div>
          </div>
        
          <!-- ./col -->
        </div>
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
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('AdminLte/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('AdminLte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('AdminLte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('AdminLte/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('AdminLte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('AdminLte/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('AdminLte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('AdminLte/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('AdminLte/dist/js/demo.js')}}"></script>


<script>
 //Date range picker with time picker
     $(function () {
    $('#datetimepicker1').datetimepicker();
 });
</script>
{{-- <script type="text/javascript" src="js/main.js"></script>
<script src="js/jquery.js"></script> --}}
</body>
</html>
