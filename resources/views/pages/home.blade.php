@extends('layouts.master')
@section('contain')
<div class="slideshow-container">
    <div class="mySlides fade" style="display: block;">
        <img src="https://cinestar.com.vn/pictures/z2161740545178_a8a9f7496b64b022c7303a779f958fc3.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
        <img src="https://cinestar.com.vn/pictures/z2161740555616_cf6d683f88aa9447af57b89917e84acb.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
        <img src="https://www.cinestar.com.vn/pictures/z2161740555387_88fc044837bea7695ee9ec8320a39cef.jpg" style="width:100%">
    </div>
    <div style="text-align:center">
        <span class="dot active" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
</div>
<br>
<div class="home">
    <div class="title" id="title1">
        <a href="javascript:void(null);">
            <h4 onclick="hienPhimdangchieu()">PHIM ĐANG CHIẾU</h4>
        </a>
    </div>
    <div class="title" id="title2">
        <a href="javascript:void(null);">
            <h4 onclick="hienPhimsapchieu()">PHIM SẮP CHIẾU</h4>
        </a>
    </div>
    <div class="hot-movie" id="dangchieu">
        @foreach($new_phim as $new)
        <div class="three-col">
            <div class="img-con">
                <img src="{{$new->hinhanh}}">
            </div>
            <div class="overlay">
            <h4 class="text">
                {{$new->tenphim}} 
            </h4>
                <form action="{{route('chon-phim')}}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{route('chi-tiet',$new->maphim)}}">CHI TIẾT</a>
                        <button name="idphim" type="submit" value="{{$new->maphim}}"class="button">MUA NGAY</button>
                </form>
            </div>
        </div>
        @endforeach
        <div class="next">
            <a href="{{route('phim-dang-chieu')}}">XEM THÊM</a>
        </div>
    </div>
  <div class="hot-movie" id="sapchieu">
      @foreach($pre_phim as $pr)
      <div class="three-col">
          <div class="img-con">
              <img src="{{$pr->hinhanh}}">
          </div>
          <div class="overlay">
          <h4 class="text">
              {{$pr->tenphim}} 
          </h4>
              <form action="{{route('chon-phim')}}" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <a href="{{route('chi-tiet',$pr->maphim)}}">CHI TIẾT</a>
              </form>
          </div>
      </div>
      @endforeach
      <div class="next">
        <a href="{{route('phim-sap-chieu')}}">XEM THÊM</a>
    </div>
  </div>
         
</div>
@endsection