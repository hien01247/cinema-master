@extends('layouts.master')
@section('contain')
<div class="header">
    <h1>Mua vé</h1>
</div>
<table class="buy-ticket">
    <tr>
        <td class="left-col">
                <div class="nav-list">
                    <ul>
                        <li class="nav-item">
                            <a class="nav-link disabled">Chọn phim</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active">Chọn rạp</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Suất chiếu</a>
                        </li>
                    </ul>
                </div>
                <div class="pick-hall">
                    @foreach($rap as $rap)
                        <div class="image">
                            <img src="{{$rap->hinh_anh}} " alt="" class="img-fluid">
                            <div class="overlay">
                                <h4>
                                    <a href="#"><b>{{$rap->tenrap}}</b></a>
                                </h4>
                                <form action="{{route('chon-suat-chieu')}}" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <p>
                                        <select hidden name="idrap"><option value="{{$rap->marap}}"></option> </select>
                                        <button type="submit" name="idphim" value="{{$phimDaChon->first()->maphim}}" >
                                            Chọn Rạp
                                        </button>
                                    </p>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="back">
                    <a href="#" onclick="goBack()" > Quay lại</a>                    
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
                        <td>{{$phimDaChon->first()->tenphim}}</td>
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