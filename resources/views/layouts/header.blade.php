<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('images/logo_pmi.png')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('plugins/node-waves/waves.css')}}" rel="stylesheet"/>

    <!-- Animation Css -->
    <link href="{{asset('plugins/animate-css/animate.css')}}" rel="stylesheet"/>

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="{{asset('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet"/>

    <!-- Wait Me Css -->
    <link href="{{asset('plugins/waitme/waitMe.css')}}" rel="stylesheet"/>

    <!-- Bootstrap Select Css -->
    <link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet"/>

    <!-- Custom Css -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('css/themes/all-themes.css')}}" rel="stylesheet"/>

    <!-- Bootstrap Select Css -->
    <link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet')}}"/>

    <!-- Jquery DataTable Plugin CSS -->
    <link href="{{asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

</head>

<body class="theme-red">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->

<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{url('beranda')}}">UTD PMI Kab. Jombang</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">

            </ul>
        </div>
    </div>
</nav>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="{{ asset('images/logo_pmi.png') }}" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name">{{ Auth::user()->name }}</div>
                <div class="email">{{ Auth::user()->email }}</div>
            </div>
        </div>
        <!-- #User Info -->

        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MENU UTAMA</li>
                @if(Auth::user()->role == 1)
                    <li class="{{ Request::is('beranda*') ? 'active' : '' }}">
                        <a href="{{url('/beranda')}}">
                            <i class="material-icons">home</i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('stok*') ? 'active' : '' }}">
                        <a href="{{url('/stok')}}">
                            <i class="material-icons">opacity</i>
                            <span>Stok Darah</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('permintaan*') ? 'active' : '' }}">
                        <a href="{{url('/permintaan')}}">
                            <i class="material-icons">assignment</i>
                            <span>Permintaan</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('pendonor*') ? 'active' : '' }}">
                        <a href="{{url('/pendonor')}}">
                            <i class="material-icons">people</i>
                            <span>Pendonor</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('peramalan*') ? 'active' : '' }}">
                        <a href="{{url('/peramalan')}}">
                            <i class="material-icons">code</i>
                            <span>Peramalan</span>
                        </a>
                    </li>

                @elseif(Auth::user()->role == 2)
                    <li class="{{ Request::is('beranda*') ? 'active' : '' }}">
                        <a href="{{url('/beranda')}}">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('stok*') ? 'active' : '' }}">
                        <a href="{{url('/stok')}}">
                            <i class="material-icons">opacity</i>
                            <span>Stok Darah</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('permintaan*') ? 'active' : '' }}">
                        <a href="{{url('/permintaan')}}">
                            <i class="material-icons">assignment</i>
                            <span>Permintaan</span>
                        </a>
                    </li>

                @elseif(Auth::user()->role == 3)
                    <li class="{{ Request::is('beranda*') ? 'active' : '' }}">
                        <a href="{{url('/beranda')}}">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('stok*') ? 'active' : '' }}">
                        <a href="{{url('/stok')}}">
                            <i class="material-icons">opacity</i>
                            <span>Stok Darah</span>
                        </a>
                    </li>
                @endif
                <li class="header">MENU TAMBAHAN</li>
                <li>
                    <a href="{{route('logout')}}">
                        <i class="material-icons">input</i>
                        <span>LOGOUT</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->

        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2018 <a href="javascript:void(0);">SISFO - UTD PMI Kab. Jombang</a>.
            </div>
            <div class="version">
                <b>F. Ilmu Komputer </b> - P.S. Sistem Informasi
            </div>
        </div>
        <!-- #Footer -->

    </aside>
    <!-- #END# Left Sidebar -->

</section>

<!-- Isi Halaman -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Halaman @yield('isiLuarAtas')</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @yield('konten')
            </div>
        </div>
        <div class="block-header">
            @yield('isiLuar')
        </div>
    </div>
</section>


<!-- Jquery Core Js -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Select Plugin Js -->
<script src="{{asset('plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{asset('plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{asset('plugins/node-waves/waves.js')}}"></script>

<!-- ChartJs -->
<script src="{{asset('plugins/chartjs/Chart.bundle.js')}}"></script>

<!-- Autosize Plugin Js -->
<script src="{{asset('plugins/autosize/autosize.js')}}"></script>

<!-- Bootstrap Notify Plugin Js -->
<script src="{{asset('plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>

<!-- Moment Plugin Js -->
<script src="{{asset('plugins/momentjs/moment.js')}}"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="{{asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="{{asset('plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

<!-- Custom Js -->
<script src="{{asset('js/admin.js')}}"></script>
<script src="{{asset('js/pages/forms/basic-form-elements.js')}}"></script>
<script src="{{asset('js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{asset('js/pages/ui/notifications.js')}}"></script>


<!-- Demo Js -->
<script src="{{asset('js/demo.js')}}"></script>


<script type="text/javascript">
    $(document).ready(function(){

        $('#date-format').bootstrapMaterialDatePicker
        ({
            format: 'YYYY-MM-DD'
        });
        $('#date-fr').bootstrapMaterialDatePicker
        ({
            format: 'YYYY-MM-DD',
            lang: 'fr',
            weekStart: 1,
            cancelText: 'ANNULER',
            nowButton: true,
            switchOnClick: true
        });

        $('.validasi').on("click", function (e) {
            e.preventDefault();

            var choice = confirm($(this).attr('data-confirm'));

            if (choice) {
                window.location.href = $(this).attr('href');
            }
        });

        $('.editpendonor').on('click', function(){
            $('#id').val($(this).data('id'));
            $('#no_ktp').val($(this).data('noktp'));
            $('#nama_pendonor').val($(this).data('namapendonor'));
            $('#alamat_pendonor').val($(this).data('alamatpendonor'));
            if ($(this).data('jeniskelamin') == 'Laki-laki'){
                $('#radio_1').attr('checked', true);
            }else if($(this).data('jeniskelamin') == 'Perempuan'){
                $('#radio_2').attr('checked', true);
            }
            $('#tempat_lahir').val($(this).data('tempatlahir'));
            $('#tanggal_lahir').val($(this).data('tgllahir'));
            $('#status_pendonor').val($(this).data('status')).change();
            $('#pekerjaan_pendonor').val($(this).data('pekerjaanpendonor'));
            $('#gol_dar').val($(this).data('goldarah')).change();
            $('#resus').val($(this).data('rhesus')).change();
            $('#nama_ibu').val($(this).data('ibukandung'));
            $('#no_hp').val($(this).data('nohp'));
            $('#editpendonor').modal('show');
        });

        $('.showdonor').on('click', function(){
            $('#id_donor').val($(this).data('id'));
            $('#tgl_donor').val($(this).data('tgldonor'));
            $('#no_ktp').val($(this).data('noktp'));
            $('#donor_ke').val($(this).data('donorke'));
            $('#donor_terakhir').val($(this).data('donorterakhir'));
            $('#tempat_donor').val($(this).data('tempatdonor'));
            $('#instansi_penyelenggara').val($(this).data('penyelenggara'));
            $('#donor_aphereris').val($(this).data('aphereris'));
            $('#hb_donor').val($(this).data('hb')+ (' g/dL'));
            $('#hct_donor').val($(this).data('hct')+ (' %'));
            $('#berat_badan').val($(this).data('beratbadan')+ (' Kg'));
            $('#tensi_darah').val($(this).data('tensi')+ (' mmHg'));
            $('#suhu_badan').val($(this).data('suhu')+ (' C'));
            $('#nadi_donor').val($(this).data('nadi')+ (' bpm'));
            $('#nama_petugas').val($(this).data('petugas'));
            $('#showdonor').modal('show');
        });

        $('.editdonor').on('click', function(){
            $('#id-donor').val($(this).data('iddonor'));
            $('#tgl-donor').val($(this).data('tgldonor'));
            $('#no-ktp').val($(this).data('noktp'));
            $('#donor-ke').val($(this).data('donorke'));
            $('#donor-terakhir').val($(this).data('donorterakhir'));
            $('#tempat-donor').val($(this).data('tempatdonor')).change();
            $('#instansi-penyelenggara').val($(this).data('penyelenggara')).change();
            $('#donor-aphereris').val($(this).data('aphereris')).change();
            $('#hb-donor').val($(this).data('hb'));
            $('#hct-donor').val($(this).data('hct'));
            $('#berat-badan').val($(this).data('beratbadan'));
            $('#tensi-darah').val($(this).data('tensi'));
            $('#suhu-badan').val($(this).data('suhu'));
            $('#nadi-donor').val($(this).data('nadi'));
            $('#nama-petugas').val($(this).data('petugas'));
            $('#editdonor').modal('show');
        });

        $('.editstok').on('click', function(){
            $('#id_kantong').val($(this).data('idkantong'));
            $('#iddonor').val($(this).data('iddonor')).change();
            $('#komponen').val($(this).data('komponen')).change();
            $('#tgl_kadaluarsa').val($(this).data('tglkadaluarsa'));
            $('#jenis').val($(this).data('jenis')).change();
            $('#editstok').modal('show');
        });

        $('.hapus').on("click", function (e) {
            e.preventDefault();

            var choice = confirm($(this).attr('data-confirm'));

            if (choice) {
                window.location.href = $(this).attr('href');
            }
        });
    });
</script>

</body>

</html>