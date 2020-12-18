@extends('master') 
@section('content')
<!-- SLIDER Start-->
<script src="sources/js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300italic,regular,italic,700,700italic&subset=latin-ext,greek-ext,cyrillic-ext,greek,vietnamese,latin,cyrillic"
  rel="stylesheet" type="text/css" />

<section class="background-pentagon mb-0">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <dir class="rowduy" style="padding-top: 20px !important;">
          <div class="heading text-center"  id="dang">
            <a href="javascript:void(null);">
              <h4 onclick="hienPhimdangchieu()">Phim đang chiếu</h4>
            </a>
          </div>
          <div class="heading text-center"  id="sap">
            <a href="javascript:void(null);">
              <h4 onclick="hienPhimsapchieu()">Phim sắp chiếu</h4>
            </a>
          </div>
        </dir>
        <!--  aaa -->
        <!-- Carousel Start-->

        <!-- phim đang chiếu -->
        <ul class="owl-carousel testimonials list-unstyled equal-height" id="dangchieu">
          @foreach($new_phim as $new)
          <li class="item">
            <div class="col-md-auto item center">

              <div class="box-image">
                <div class="image">
                  <img src="{{$new->hinhanh}} " alt="" class="img-fluid" height="50" width="200">
                  <div class="overlay d-flex align-items-center justify-content-center">
                    <div class="content">
                      <div class="name">
                        <h4>
                          <a href="{{route('chi-tiet',$new->maphim)}}" class="color-white">{{$new->tenphim}} </a>
                        </h4>
                      </div>
                      <form action="{{route('chon-phim')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{route('chi-tiet',$new->maphim)}}" class="btn btn-template-outlined-white">Chi tiết</a>
                        <button name="idphim" type="submit" value="{{$new->maphim}}" class="btn btn-template-outlined-white">Chọn</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
          @endforeach
        </ul>

        <!-- phim sắp chiếu -->
        <ul class="owl-carousel testimonials list-unstyled equal-height" id="sapchieu">
          @foreach($pre_phim as $pr)
          <li class="item">
            <div class="col-md-auto item">
              <div class="box-image">
                <div class="image">
                  <img src="{{$pr->hinhanh}} " alt="" class="img-fluid" height="50" width="200">
                  <div class="overlay d-flex align-items-center justify-content-center">
                    <div class="content">
                      <div class="name">
                        <h4>
                          <a href="{{route('chi-tiet',$pr->maphim)}}" class="color-white">{{$pr->tenphim}} </a>
                        </h4>
                      </div>
                      <form action="{{route('chon-phim')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{route('chi-tiet',$pr->maphim)}}" class="btn btn-template-outlined-white">Chi tiết</a>
                        <button name="idphim" type="submit" value="{{$pr->maphim}}" class="btn btn-template-outlined-white">Chọn</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
          @endforeach
        </ul>
        <!-- Carousel End-->
        <script type="text/javascript">
          var x = document.getElementById("sapchieu");
          x.style.display = "none";

          function hienPhimsapchieu() {
            $("#dangchieu").hide();
            $("#sapchieu").show();
          }

          function hienPhimdangchieu() {
            $("#sapchieu").hide();
            $("#dangchieu").show();
          }
        </script>
      </div>
    </div>
  </div>
</section>

<section style="background: url('sources/img/ok.jpg') center top no-repeat; background-size: cover;" class="bar no-mb color-white text-center bg-fixed relative-positioned">
  <div class="dark-mask"></div>
  <div class="container">
    <div class="icon icon-outlined icon-lg">
      <i class="fa fa-file-code-o"></i>
    </div>
    <h3 class="text-uppercase">Bạn muốn nhận ưu đãi?</h3>
    <p class="lead">Hãy đăng ký thành viên để được hưởng những khuyến mãi hấp dẫn nhất! </p>
    <p class="text-center">
      <a href="dang-ky" class="btn btn-template-outlined-white btn-lg">Đăng ký ngay</a>
    </p>
  </div>
</section>

@endsection