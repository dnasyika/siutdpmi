<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="no-js oldie" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>UTD PMI Kab. Jombang</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{asset('assetsLanding/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('assetsLanding/css/vendor.css')}}">
    <link rel="stylesheet" href="{{asset('assetsLanding/css/main.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- script
    ================================================== -->
    <script src="{{asset('assetsLanding/js/modernizr.js')}}"></script>
    <script src="{{asset('assetsLanding/js/pace.min.js')}}"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="{{asset('assetsLanding/images/logo_pmi.png')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('assetsLanding/images/logo_pmi.png')}}" type="image/x-icon">

</head>

<body id="top">

<!-- header
================================================== -->
<header class="s-header">

    <div class="header-logo">
        <a class="site-logo" href="{{url('/')}}">
            <img src="{{asset('assetsLanding/images/logo_pmi.png')}}" alt="Homepage">
        </a>
    </div>

    <nav class="header-nav">

        <a href="#0" class="header-nav__close" title="close"><span>Close</span></a>

        <div class="header-nav__content">
            <h3>Navigation</h3>

            <ul class="header-nav__list">
                <li class="current"><a class="smoothscroll"  href="#home" title="beranda">Beranda</a></li>
                <li><a class="smoothscroll"  href="#about" title="profil">Profil</a></li>
                <li><a class="smoothscroll"  href="#services" title="visi & misi">Visi & Misi</a></li>
                <li><a class="smoothscroll"  href="#contact" title="quote">Quote</a></li>
            </ul>

            <p>Silahkan login untuk melanjutkan. Atau register jika anda belum terdaftar</p>

        </div> <!-- end header-nav__content -->

    </nav>  <!-- end header-nav -->

    <a class="header-menu-toggle" href="#0">
        <span class="header-menu-text">Menu</span>
        <span class="header-menu-icon"></span>
    </a>

</header> <!-- end s-header -->


<!-- home
================================================== -->
<section id="home" class="s-home target-section" data-parallax="scroll" data-image-src="assetsLanding/images/bg-donor.jpg" data-natural-width=3000 data-natural-height=2000 data-position-y=center>

    <div class="overlay"></div>
    <div class="shadow-overlay"></div>

    <div class="home-content">

        <div class="row home-content__main">

            <h3>Selamat Datang Di</h3>

            <h1>
                Sistem informasi <br>
                UTD PMI Kabupaten Jombang <br>
            </h1>

            <div class="home-content__buttons">
                <a href="{{ route('login') }}" class="btn btn--stroke">
                    Login
                </a>
            </div>

        </div>

        <div class="home-content__scroll">
            <a href="#about" class="scroll-link smoothscroll">
                <span>Scroll Down</span>
            </a>
        </div>

        <div class="home-content__line"></div>

    </div> <!-- end home-content -->

</section> <!-- end s-home -->


<!-- about
================================================== -->
<section id='about' class="s-about">

    <div class="row section-header has-bottom-sep" data-aos="fade-up">
        <div class="col-full">
            <h3 class="subhead subhead--dark">Profil</h3>
            <h1 class="display-1 display-1--light">UTD PMI Kab. Jombang</h1>
        </div>
    </div> <!-- end section-header -->

    <div class="row about-desc" data-aos="fade-up">
        <div class="col-full">
            <p>
                Unit Transfusi Darah (UTD) adalah unit pelayanan transfusi darah, dan merupakan Unit Pelaksana Tekhnis dari Palang Merah Indonesia (PMI). Pelayanan transfusi darah merupakan upaya pelayanan kesehatan yang meliputi perencanaan, pengerahan, pelestarian donor, penyediaan darah, pendistribusian darah dan tindakan medis pemberian darah transfusi kepada pasien untuk tujuan penyembuhan penyakit dan pemulihan kesehatan.
            </p>
        </div>
    </div> <!-- end about-desc -->

    <div class="row about-stats stats block-1-4 block-m-1-2 block-mob-full" data-aos="fade-up">

        <div class="col-block stats__col ">
            <div class="stats__count">{{$pendonor}}</div>
            <h5>Pendonor</h5>
        </div>
        <div class="col-block stats__col">
            <div class="stats__count">{{$stok}}</div>
            <h5>Kantong Darah</h5>
        </div>
        <div class="col-block stats__col">
            <div class="stats__count">{{$totalpermintaan}}</div>
            <h5>Permintaan</h5>
        </div>
        <div class="col-block stats__col">
            <div class="stats__count">{{$manajer}}</div>
            <h5>Rumah Sakit</h5>
        </div>

    </div> <!-- end about-stats -->

    <div class="about__line"></div>

</section> <!-- end s-about -->


<!-- services
================================================== -->
<section id='services' class="s-services">

    <div class="row section-header has-bottom-sep" data-aos="fade-up">
        <div class="col-full">
            <h3 class="subhead">Visi & Misi</h3>
            <h1 class="display-2">UTD PMI Kab. Jombang</h1>
        </div>
    </div> <!-- end section-header -->

    <div class="row services-list block-1-2 block-tab-full">

        <div class="col-block service-item" data-aos="fade-up">
            <div class="service-icon">
                <i class="icon-cube"></i>
            </div>
            <div class="service-text">
                <h3 class="h2">Visi</h3>
                <p>PMI yang berkarakter, profesional, mandiri dan dicintai masyarakat
                </p>
            </div>
        </div>

        <div class="col-block service-item" data-aos="fade-up">
            <div class="service-icon">
                <i class="icon-cube"></i>
            </div>
            <div class="service-text">
                <h3 class="h2">Misi</h3>
                <p>1. Menjadi organisasi kemanusiaan terdepan yang memberikan layanan berkualitas melalui kerja sama dengan masyarakat dan mitra sesuai dengan prinsip-prinsip dasar Gerakan Palang Merah dan Bulan Sabit Merah.
                </p>
                <p>2. Meningkatkan kemandirian organisasi PMI melalui kemitraan strategis yang berkesinambungan dengan pemerintah, swasta, mitra gerakan dan pemangku kepentingan lainnya di semua tingkatan.
                </p>
                <p>3. Meningkatkan reputasi organisasi PMI di tingkat Nasional dan Internasional.
                </p>
            </div>
        </div>

    </div> <!-- end services-list -->

</section> <!-- end s-services -->


<!-- contact
================================================== -->
<section id="contact" class="s-contact">

    <div class="overlay"></div>
    <div class="contact__line"></div>

    <div class="row section-header" data-aos="fade-up">
        <div class="col-full">
            <h3 class="subhead">Quote</h3>
            <h1 class="display-2 display-2--light">"Setetes Darah Anda Nyawa Bagi Sesama"</h1>
        </div>
    </div>

</section> <!-- end s-contact -->


<!-- footer
================================================== -->
<footer>

    <div class="row footer-bottom">

        <div class="col-twelve">
            <div class="copyright">
                <span>© Copyright PSSI UNEJ 2018</span>
                <span>UTD PMI Kab. Jombang</span>
            </div>

            <div class="go-top">
                <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon-arrow-up" aria-hidden="true"></i></a>
            </div>
        </div>

    </div> <!-- end footer-bottom -->

</footer> <!-- end footer -->


<!-- photoswipe background
================================================== -->
<div aria-hidden="true" class="pswp" role="dialog" tabindex="-1">

    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">

        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title=
                "Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title=
                "Zoom in/out"></button>
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title=
            "Next (arrow right)"></button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>

    </div>

</div> <!-- end photoSwipe background -->


<!-- preloader
================================================== -->
<div id="preloader">
    <div id="loader">
        <div class="line-scale-pulse-out">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>


<!-- Java Script
================================================== -->
<script src="{{asset('assetsLanding/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assetsLanding/js/plugins.js')}}"></script>
<script src="{{asset('assetsLanding/js/main.js')}}"></script>

</body>

</html>