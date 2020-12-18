<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <nav>
        <a href="{{route('trang-chu')}}">
                <img src="{{ asset('images/Untitled-4.png') }}" alt="logo" class="logo">
        </a>
        <ul>
            <li><a href="{{route('trang-chu')}}">Trang chủ</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Phim</a>
                <div class="dropdown-content">
                  <a href="{{route('phim-dang-chieu')}}">Phim đang chiếu</a>
                  <a href="{{route('phim-sap-chieu')}}">Phim sắp chiếu</a>
                </div>
            </li> 
            <li><a href="{{route('mua-ve-menu')}}">Đặt vé</a></li>
            <li><a href="#">Hệ thống rạp</a></li>
            <li><a href="#">Khuyến mãi</a></li>
            <li><a href="#">Liên hệ</a></li>
        </ul>
    </nav>
        <div class="search-form"> 
        <form action="" method="post">
            <input type="text" name="search" placeholder="Tìm kiếm...">
            <input type="submit" value="submit">
        </form>
        </div>
    <div class="auth">
        @if(Auth::check())
        <div>
            <a href="{{route('profile')}}" class="profile-btn">
                <i class="fa fa-user"></i>
                | Tài khoản
            </a>
            <a href="{{route('dang-xuat')}}" class="signout-btn">
                <i class="fa fa-sign-out"></i>
                Đăng xuất
            </a>
        </div>
        @else
        <div>
            <a href="javascript:void(null);" id="dnhap">| Đăng nhập</a>
            <a href="dang-ky" class="signup-btn">
                <i class="fa fa-user"></i>
                Đăng ký
            </a>
        </div>
        @endif
    </div>
    <div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>            
        <div class="login" id="wpuf-login-form">       
            <form action="{{route('dang-nhap')}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <p>
                <label for="wpuf-user_login">Email</label><br>
                <input type="text" name="email" id="email_modal" class="input" size="20" required/>
            </p>
            <p>
                <label for="wpuf-user_pass">Password</label><br>
                <input type="password" name="password" id="password_modal" class="input" size="20" required/>
            </p>   
            <p class="forgetmenot">
                <input name="rememberme" type="checkbox" id="wpuf-rememberme" value="forever" />
                <label for="wpuf-rememberme">Remember Me</label>
            </p>
            <button type="submit" class="btn btn-template-outlined">
                <i class="fa fa-sign-in"></i>Đăng nhập</button>
            <p><a href="https://www.madhatgirls.com/apply">Register</a> 
            </form>
        </div>
    </div>
    </div>
    <div class="parallax1">    </div>
    @include('layouts.flash-message')
    
    <div class="contain">
        @section('contain')
        @show
    </div>
    
    <div class="footer-content">
        <div class="two-col">
            <div class="footer-title">Liên hệ</div>
            <div class="ft-logo">
                <img src="{{ asset('images/logo2.png') }}" alt="ft-logo">
            </div>
            <p class="small">Hệ thống rạp chiếu phim SHTEAM CINEMA</p>
            <p class="big">Công ty cổ phần truyền thông và giải trí SH</p>
            <div class="small1"><img src="{{ asset('images/pin.png') }}" >Khu phố 6, P.Linh Trung, Q.Thủ Đức, TP.Hồ Chí Minh
                <p><img src="{{ asset('images/print.png') }}"> 032 411 59923 &emsp; &emsp; &emsp;&emsp;&emsp;&emsp;&emsp;<img src="{{ asset('images/email.png') }}"> 032 411 59923</p>
            </div>
      </div>
      <div class="two-col">
        <div class="footer-title">Liên kết</div>
        <a href="#"><img src="{{ asset('images/fb.png') }}"></a>
        <a href="#"><img src="{{ asset('images/yt.png') }}"></a>
        <div class="footer-title">Hotline</div>
        <p></p>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><script  src="{{asset('js/script.js')}}"></script>    
    
</body>
</html>