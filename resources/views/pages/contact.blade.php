@extends('layouts.master')
@section('contain')
<div class="header">
    <h1>Liên hệ</h1>
</div>
        
<table class="contact">
    <tr>
    <td class="threecol">
        <img src="{{asset('images/ct1.png')}}">
        <p>Tòa nhà A, Khu phố 6, P.Linh Trung,<br> Q.Thủ Đức, TP.Hồ Chí Minh</p>
    </div>
    <td class="threecol">
        <img src="{{asset('images/ct2.png')}}">
        <p>Tổng đài online 24/24</p>
        <p>01639 876 888</p>
    </td> 
    <td class="threecol">
        <img src="{{asset('images/ct3.png')}}">
        <p>Hệ thống tiếp nhận phản hồi khách hàng</p>
        <p>SHTEAM@gmail.com</p>
    </td>
    </tr>                         
</table>
<img src="{{asset('images/banner.jpg')}}">

@endsection