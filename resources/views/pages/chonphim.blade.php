@extends('layouts.master')
@section('contain')
<div class="header">
    <h1>Mua vé</h1>
</div>

<table class="buy-ticket">
<tr>
    <td class="left-col">
        <form action="{{route('chon-rap')}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="nav-list">
                <ul>
                    <li class="nav-item">
                        <a class="nav-link active">Chọn phim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Chọn rạp</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Suất chiếu</a>
                    </li>
                </ul>
            </div>
            <table class="table-movie">
                        <thead>
                            <tr>
                                <th colspan="3" class="padding-left">Phim</th>
                                <th>Đối tượng</th>
                                <th>Thời lượng</th>
                                <th>Lựa chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td><img src="{{$phimDaChon->first()->hinhanh}}" alt="Poster phim"></td>
                                    <td colspan="2">
                                        <a href="{{route('chi-tiet',$phimDaChon->first()->maphim)}}" target="_blank"><b>{{$phimDaChon->first()->tenphim}}</b></a>
                                    </td>
                                    <td>{{$phimDaChon->first()->doituong}}</td>
                                    <td>{{$phimDaChon->first()->thoiluong}}</td>
                                    <td><button type="submit" name="idphim" value="{{$phimDaChon->first()->maphim}}" class="btn btn-template-main">Chọn</button></td>
                                </tr>
                        </tbody>
            </table>
            <div class="back">
                <a href="index" >Quay về trang chủ</a>                    
            </div>
        </form>
    </td>
    <td class="right-col">
        <div class="ticket-info">
            <h4>THÔNG TIN VÉ</h4>
        </div>
        <table class="table2">
            <tbody>
                <tr>
                    <td>Phim</td>
                    <td>Chưa chọn </td>
                </tr>
                <tr>
                    <td>Rạp</td>
                    <td>Chưa chọn</td>
                </tr>
                <tr>
                    <td>Suất chiếu</td>
                    <td>Chưa chọn</td>
                </tr>
                <tr>
                    <td colspan="2" class="align-center"><button type="submit" disabled>Thanh toán</button></td>
                </tr>
            </tbody>
        </table>    
    </td>
</tr>
</table>
   
@endsection