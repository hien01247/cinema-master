@extends('layouts.master')
@section('contain')
<div class="header">
    <h1>Thanh toán</h1>
</div>
<div class="buy-ticket">
    <h3>
        <img src="{{$phimDaChon->first()->hinhanh}} " alt="phim" class="pay-img">
    </h3>           
    <p class="pay-name">{{$phimDaChon->first()->tenphim}} </p>
    <table class="pay-table">
        <tr>
            <td>Rạp:</td>
            <td>{{$rapDaChon->first()->tenrap}} </td>
        </tr>
        <tr>
            <td>Suất chiếu:</td>
            <td>{{$ngay}} | {{$gio}} </td>
        </tr>
        <tr>
            <td>Ghế: </td>
            <td> {{$gheso}}</td>
        </tr>
        <tr>
            <td>Định dạng: </td>
            <td> {{$loaiphong}} </td>
        </tr>
        <tr>
            <td>Phòng số: </td>
            <td>{{$phong->first()->maphong}} </td>
        </tr>
            <tr class="total">
            <td >Tổng tiền: </td>
            <td>  {{$tongcong}}</td> 
        </tr>
    </table>
    <div class="back">
        <a href="index" >Quay về trang chủ</a>                    
    </div>
@endsection