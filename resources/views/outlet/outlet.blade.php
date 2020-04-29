<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Outlet</title>
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
   {{-- Toastr --}}
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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

  .link{
    float:right;
  }


  </style>
<div class="wrapper">

  <!-- Navbar -->
    @include('navbar');
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @include('outlet/sidebar');
  {{-- sidebar end --}}

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Outlet</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Outlet</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
     <section class="content">
      <div class="container-fluid">

        {{-- @if ($message = Session::get('success'))
            <div class="alert alert-success alert block">
                <button type="button" class="close" data-dismiss="alert"> x </button>
                <strong>{{ $message }}</strong>
            </div>
        @endif    
        
        @foreach ($outlet as $row)  
        <div class="modal small fade" id="myModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="myModalLabel" style="float:left;margin-right:200px;">Delete Konfirmasi</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                    
                <form method="POST" id="deleteForm" action"{{route('delete',$row->id) }}">
                  @csrf
                  {{ method_field('DELETE') }}
                <div class="modal-body">
                  <input type="hidden" name="_method" value="DELETE">
                    <p class="error-text"><i class="fa fa-warning modal-icon"></i><p style="font-size:25px;font-family: 'Righteous', cursive;margin-bottom:30px">Apakah anda ingin menghapus data ini</p>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-default"data-dismiss="modal" aria-hidden="true">Cancel</button> <button class="btn btn-danger remove">Delete</button>

                </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach --}}
    
        <!-- Small boxes (Stat box) -->
        <div class="row mt-4 p-3">
          <div class="col-lg col">
            <div class="card panel-border panel-primary">
              <p class="card-header">
                  <i class="fas fa-users" style="color:#2F63C7;"></i><label style="margin-left:5px;color:#2F63C7;"> Data Outlet</label> 
              </p>
              <div class="card-body">
                
                <form action="/outlet/cari" method="GET" align="left">
                  <table>
                    <td><a href="/outlet/tambah" style="margin-right:600px;float:left;" class="btn btn-primary mb-2 text-white"><i class="fas fa-plus-square mr-2 text-white rounded"></i>Tambah
                Outlet</a></td>
                <div class="cari">
                    <td><input type="submit" value="Cari" class="btn btn-primary" style="margin-left:55px" id="cari-data"></td>
                    <br/>
                    <td><input id="input-produk" class="form-control" type="text" name="cari" placeholder="Cari outlet......" value="{{old('cari')}}"></td>
                </div>
                  </table>
                </form>
            <table class="table table-striped table-bordered text-center" id="datatable">
                <thead style="background-color:#2F63C7;color:#ffffff">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Gambar</th>
                    <th scope="col" colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($outlet as $row)
                    <tr>
                    <th scope="row">{{ isset($i) ? ++$i : $i =1}}</th>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->alamat }}</td>
                    <td>{{ $row->tlp }}</td>
                    <td><img src="{{ url('uploadgambar') }}/{{ $row->gambar}}" width="100px" height="70px" alt="" srcset=""></td>
                        <td><a class="fas fa-edit bg-success p-2 text-white rounded"  href="/outlet/edit/{{$row->id}}" data-toggle="tooltip"
                                title="Edit"></a></td>
                        <td><a href="#" class="fas fa-trash-alt bg-danger p-2 text-white rounded delete" outlet-id={{$row->id}}></a></td>
                    </tr>    
                    @endforeach
                    
                </tbody>
            </table>
            <br>
            <div class="link">
            {{ $outlet->links() }}
            </div>
              </div>
            </div>
            <!-- small box -->
            
          </div>
        
          <!-- ./col -->
        </div>
        <!-- /.row -->

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

<script type="text/javascript" src="js/main.js"></script>
<script src="js/jquery.js"></script>
{{-- Sweet Alert --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
{{-- Toastr --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
  $('.delete').click(function(){
    var outlet_id = $(this).attr('outlet-id');
    swal({
        title: "Yakin ?",
        text: "Mau dihapus data admin dengan id "+outlet_id +" ??",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        console.log(willDelete);
        if (willDelete) {
          window.location = "/outlet/hapus/"+outlet_id+"";
        }
      });
    })

    @if(Session::get('success')) {
      toastr.success("{{Session::get('success')}}", "Sukses")
    }
    @endif
 
</script>
</body>
</html>
