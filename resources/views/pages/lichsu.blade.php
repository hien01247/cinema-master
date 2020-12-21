@extends('layouts.master')
@section('contain')
<div class="header">
    <h1>Lịch sử đặt vé</h1>
</div>
<p class="text-muted lead">Bạn đã thực hiện {{count($hoadon)}}  giao dịch.</p>
<table class="buy-ticket">
    <tr>
        <td class="left-col">
            <table class="table-movie">
            <thead>
                <tr>
                    <th>Mã giao dịch</th> 
                    <th>Ngày giao dịch</th>                       
                    <th>Tổng tiền</th>
                    <th>Chi tiết</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hoadon as $hd)
                    <tr>
                        <th>#{{$hd->mahoadon}}  </th>
                        <td>{{$hd->ngayxuat}} </td>
                        <td>{{$hd->tongtien}} </td>
                        <form action="{{route('chi-tiet-lich-su')}}" method="POST" >
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="idhoadon" value="{{$hd->mahoadon}}">
                        <td><button  type="submit">Xem</button></td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
            </table>
          </td>       
          <td class="right-col">
            <div class="list">
                <ul>
                    <li>
                        <a href="{{route('profile')}}">Thông tin cá nhân</a>
                    </li>    
                    <li class="active">
                        <a>Lịch sử giao dịch</a>
                    </li>
                </ul>           
            </div>
        </td>
    </tr>
</table>
@endsection