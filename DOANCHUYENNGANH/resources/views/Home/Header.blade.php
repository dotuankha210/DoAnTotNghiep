
<!DOCTYPE html>

<html lang="en" class="no-js">


<head>
    <!-- Basic need -->
    <title>Open Pediatrics</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="profile" href="{{ asset('assets/Content/Client/#') }}">

    <!--Google Font-->
    <!-- Mobile specific meta -->
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone-no">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- CSS files -->
    <link rel="stylesheet" href="{{ asset('assets/Content/Client/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Content/Client/css/plugins.css') }}">

    


</head>
<style>
    body {
        padding: 20px;
        color: #293C56;
    }

    .icheckbox_flat-blue, .iradio_flat-blue {
        top: -2px;
        margin-right: 5px;
    }

    .txtGray {
        color: #798594;
    }

    .bank-group {
        margin-left: 30px;
        max-width: 850px;
    }

    a, a:hover, a:visited, a:link {
        text-decoration: none !important;
        color: #293C56;
    }

        a.bank-item {
            display: inline-block;
            width: 180px;
            height: 48px;
            padding: 10px;
            border-radius: 4px;
            border: 2px solid #f1f1f1;
            position: relative;
            vertical-align: top;
            margin-right: 10px;
            margin-bottom: 15px;
            font-size: 13px;
        }

            a.bank-item .checkmark {
                display: none;
                width: 20px;
                height: 20px;
            }

            a.bank-item.selected .checkmark {
                display: block;
                position: absolute;
                top: -10px;
                right: -10px;
                margin-right: 0;
            }

            a.bank-item.selected, a.bank-item:hover {
                border: 2px solid #04BE04;
            }

            a.bank-item img {
                vertical-align: middle !important;
                display: inline-block;
                margin-right: 5px;
            }
           


</style>

<body>
    <!--preloading-->
    <div id="preloader">
        <img class="logo" src="{{ asset('assets/Content/Client/images/logo1.png') }}" alt="" width="119" height="58">
        <div id="status">
            <span></span>
            <span></span>
        </div>
    </div>
    <!--end of preloading-->
    <!--login form popup-->
    <div class="login-wrapper" id="login-content">
        <div class="login-content">
            <a href="#" class="close">x</a>
            <h3>Đăng Nhâp</h3>
            <form method="post" id="loginForm" action="/TaiKhoan/Login">
                <div class="row">
                    <label for="username">
                        Tên Đăng Nhập
                        <input type="email" name="username" id="usernamelogin" placeholder="Tên Đăng Nhập" required="required" />
                    </label>
                </div>

                <div class="row">
                    <label for="password">
                        Mật Khẩu
                        <input type="password" name="password" id="passwordlogin" placeholder="******" required="required" />
                    </label>
                </div>
                <div class="row">
                    <div class="remember">
                        <div>
                            <input type="checkbox" name="remember" value="Remember me"><span>Remember me</span>
                        </div>
                        <a href="#">Forget password ?</a>
                    </div>
                </div>
                <div class="row">
                    <button type="submit">Đăng Nhập</button>
                </div>
            </form>
            <div class="row">
                <p>Or via social</p>
                <div class="social-btn-2">
                    <a class="fb" href="#"><i class="ion-social-facebook"></i>Facebook</a>
                    <a class="tw" href="#"><i class="ion-social-twitter"></i>twitter</a>
                </div>
            </div>
        </div>
    </div>
    <!--end of login form popup-->
    <!--signup form popup-->
    <div class="login-wrapper" id="signup-content">
        <div class="login-content">
            <a href="#" class="close">x</a>
            <h3>Đăng Ký</h3>
            <form action="/TaiKhoan/Register" method="post" id="registerForm">
                <div class="row">
                    <label for="username-2">
                        Tên Người Dùng
                        <input type="text" name="username" id="username-2" placeholder="Tên Người Dùng" required="required" />
                    </label>
                </div>

                <div class="row">
                    <label for="email-2">
                        Email
                        <input type="email" name="email" id="email-2" placeholder="" required="required" />
                    </label>
                </div>
                <div class="row">
                    <label for="password-2">
                        Mật Khẩu
                        <input type="password" name="password" id="password-2" placeholder="" required="required" />
                    </label>
                </div>
                <div class="row">
                    <label for="repassword-2">
                        Nhập Lại Mật Khẩu
                        <input type="password" name="password" id="repassword-2" placeholder="" required="required" />
                    </label>
                </div>
                <div class="row">
                    <button type="submit">Đăng Ký</button>
                </div>
            </form>
        </div>
    </div>
    <!--end of signup form popup-->
    <!--end of signup form popup-->
 

        <header class="ht-header">
            <div class="container">
                <nav class="navbar navbar-default navbar-custom">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header logo">
                        <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <div id="nav-icon1">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <a href="./Home/Content/Client/index-2.html"><img class="logo" src="{{ asset('assets/Content/Client/images/logo1.png') }}" alt="" width="119" height="58"></a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav flex-child-menu menu-left">
                            <li class="hidden">
                                <a href="./Home/Content/Client/#page-top"></a>
                            </li>
                            <li class="dropdown first">
                                <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown">
                                    Trang Chủ
                                </a>
                                
                            </li>
                            <li class="dropdown first">
                                <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                                    Thể Loại<i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu level1">
                                 
                                </ul>
                            </li>
                            <li class="dropdown first">
                                <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                            Rạp Chiếu Phim <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu level1">
                                    <li><a href="./Home/Content/Client/celebritygrid01.html">celebrity grid 01</a></li>
                                   
                                    
                                  
                                </ul>
                            </li>
                            <li class="dropdown first">
                                <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                                    news <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu level1">
                                    <li><a href="./Home/Content/Client/bloglist.html">blog List</a></li>
                                    <li><a href="./Home/Content/Client/bloggrid.html">blog Grid</a></li>
                                    <li class="it-last"><a href="./Home/Content/Client/blogdetail.html">blog Detail</a></li>
                                </ul>
                            </li>
                            <li class="dropdown first">
                                <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                                    community <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu level1">
                                    <li><a href="./Home/Content/Client/userfavoritegrid.html">user favorite grid</a></li>
                                    <li><a href="./Home/Content/Client/userfavoritelist.html">user favorite list</a></li>
                                    <li><a href="./Home/Content/Client/userprofile.html">user profile</a></li>
                                    <li class="it-last"><a href="./Home/Content/Client/userrate.html">user rate</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav flex-child-menu menu-right">
                            <li class="dropdown first">
                                <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                                    pages <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu level1">
                                    <li><a href="./Home/Content/Client/landing.html">Landing</a></li>
                                    <li><a href="./Home/Content/Client/404.html">404 Page</a></li>
                                    <li class="it-last"><a href="./Home/Content/Client/comingsoon.html">Coming soon</a></li>
                                </ul>
                            </li>
                            <li><a href="./Home/Content/Client/#">Help</a></li>
                            <li class="loginLink"><a href="./Home/Content/Client/#">LOG In</a></li>
                            <li class="btn signupLink"><a href="./Home/Content/Client/#">sign up</a></li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>
        
                <!-- top search form -->
                <div class="top-search">
                    <select>
                        <option value="united">TV show</option>
                        <option value="saab">Others</option>
                    </select>
                    <input type="text" placeholder="Search for a movie, TV Show or celebrity that you are looking for">
                </div>
            </div>
        </header>
        
    <!-- END | Header -->