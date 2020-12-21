@extends('layouts.master')
@section('contain')
<div class="header">
    <h1>Hệ thống rạp</h1>
</div>

<table class="rap">
    
    @foreach($rap as $rap)
    <tr>
        <td>                        
            <img src="{{$rap->hinh_anh}}" width="100px"  height="100px">
        </td>
        <td class="info-rap">                        
            <h4>
                {{$rap->tenrap}}
            </h4>
            <p class="head">Địa chỉ</p>
            <p>{{$rap->daichi}} </p>
            <p class="head">Số điện thoại</p>
            <p>{{$rap->sodt}}</p>
            <p class="head">Số lượng phòng chiếu</p>
            <p>{{$rap->soluongphong}} phòng</p>
        </td>
    </tr>
    @endforeach
    
</table>
@endsection