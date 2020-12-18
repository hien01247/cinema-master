@extends('layouts.master')
@section('contain')
<div class="header">
    <h1>PHIM SẮP CHIẾU TẠI RẠP</h1>
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
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection