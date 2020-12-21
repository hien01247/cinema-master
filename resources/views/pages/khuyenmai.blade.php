@extends('layouts.master')
@section('contain')
<div class="header">
    <h1>KHUYẾN MÃI</h1>
</div>    
<div class="hot-movie">
    @foreach($khuyenmai as $p)
    <div class="three-col">
        <div class="img-con">
            <img src="{{$p->hinhanh}}">
        </div>
        <div class="overlay">
            <h4 class="text" id="khuyen-mai">
                {{$p->tenkhuyenmai}} 
            </h4>      
            <p>{{$p->mota}}</p>
        </div>
    </div>
    @endforeach
</div>

@endsection