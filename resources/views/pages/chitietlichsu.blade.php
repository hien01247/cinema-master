@extends('layouts.master')
@section('contain')
<div class="header">
    <h1>Thông tin vé</h1>
</div>
<h3>
    <img src="{{$phim->first()->hinhanh}} " alt="phim" class="pay-img">
</h3> 
<table class="table-movie">
    <tr>
        <th>Phim</th> 
        <th>{{$phim->first()->tenphim}} </th>                     
    </tr>
    <tr>
        <th>Rạp chiếu</th>                       
        <td>{{$rap->first()->tenrap}} </td>
    </tr>
    <tr>
        <th>Ghế ngồi</th> 
        <td>
            @foreach($soghe as $sg)
                {{$sg}},
            @endforeach
        </td>
    </tr>
    <tr>
        <th >Suất chiếu</th>
        <td>{{$khunggio->first()->batdau}} </td>   
    </tr>
    <tr>
        <th>Ngày</th>
        <td>{{$suatchieu->first()->ngaychieu}} </td>
    </tr>
</table>
<div class="back">
    <a href="#" onclick="goBack()" > Quay lại</a>                    
</div>
@endsection