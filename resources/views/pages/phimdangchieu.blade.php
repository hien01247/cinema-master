@extends('layouts.master')
@section('contain')
<div class="header">
    <h1>PHIM ĐANG CHIẾU TẠI RẠP</h1>
</div>    
<div class="hot-movie" id="sapchieu">
    @foreach($phim as $p)
    <div class="three-col">
        <div class="img-con">
            <img src="{{$p->hinhanh}}">
        </div>
        <div class="overlay">
        <h4 class="text">
            {{$p->tenphim}} 
        </h4>
            <form action="{{route('chon-phim')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <a href="{{route('chi-tiet',$p->maphim)}}">CHI TIẾT</a>
                    <button name="idphim" type="submit" value="{{$p->maphim}}"class="button">MUA NGAY</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
<div class="end"></div>
@endsection