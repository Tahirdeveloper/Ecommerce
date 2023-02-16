<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Admin Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('Admin_styles/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Admin_styles/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Admin_styles/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Admin_styles/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('Admin_styles/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">
    <!-- Vendor CSS-->
    <!-- <link href="{{asset('Admin_styles/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Admin_styles/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Admin_styles/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Admin_styles/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Admin_styles/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Admin_styles/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Admin_styles/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all"> -->

    <link href="{{asset('Admin_styles/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="{{asset('Admin_styles/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="#">
                            <img src="{{asset('Admin_styles/images/icon/logo.png')}}" alt="CoolAdmin">
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a href="dashboard">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="category">
                                <i class="fas fa-tachometer-alt"></i>Categories</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="dashboard">
                    <img src="{{asset('Admin_styles/images/icon/logo.png')}}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="{{url('admin/dashboard')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{url('admin/category')}}">
                                <i class="fas fa-tachometer-alt"></i>Categories</a>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">

                                        <div class="content">
                                            <a class="js-acc-btn" href="#">john doe</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        @yield('main_section')
                    </div>
                    <!-- END MAIN CONTENT-->
                </div>
                <!-- END PAGE CONTAINER-->
            </div>
        </div>
    </div>
    <!-- Jquery JS-->
    <script src="{{asset('Admin_styles/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('Admin_styles/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('Admin_styles/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS -->
    <script src="{{asset('Admin_styles/vendor/slick/slick.min.js')}}"> </script>
    <script src="{{asset('Admin_styles/vendor/wow/wow.min.js')}}"></script>
    <script>
        let btn = document.getElementsByClassName('account-item');
        console.log(btn);
        btn.onclick = function() {
            this.classList.add("show-dropdown");
            console.log("class added");
        };
    </script>
    <!--  <script src="{{asset('Admin_styles/vendor/animsition/animsition.min.js')}}"></script>
     <script src="{{asset('Admin_styles/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>-->
    <script src="{{asset('Admin_styles/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('Admin_styles/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script>
        $('.account-item').on('click', function() {
            $(this).toggleClass('show-dropdown');
        })
    </script>
    <!-- <script src="{{asset('Admin_styles/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('Admin_styles/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('Admin_styles/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('Admin_styles/vendor/select2/select2.min.js')}}">
    </script> -->

    <!-- Main JS-->
    <script src="{{asset('Admin_styles/js/main.js')}}"></script>
</body>

</html>
<!-- end document-->