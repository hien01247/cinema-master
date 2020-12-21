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
                            <a class="nav-link disabled">Chọn rạp</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active">Suất chiếu</a>
                        </li>
                    </ul>
                </div>
                <section>
                    
                        @foreach($kgtungngay as $ngay)
                        <div class="show">
                            <div class="date">
                                <h4>
                                    {{$ngay->first()->ngaychieu}}
                                </h4>
                            </div>
                            <form action="{{route('mua-ve')}} " method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <select hidden name="ngaychieu" ><option value="{{$ngay->first()->ngaychieu}}"></option> </select>
                            <select hidden name="idphim" ><option value="{{$phimDaChon->first()->maphim}}"></option> </select>
                            <select hidden name="idrap" ><option value="{{$rapDaChon->first()->marap}}"></option> </select>
                            <div id="{{$ngay->first()->ngaychieu}}">
                                <div class="time">
                                @foreach($ngay as $gio)

                                    <button name="giochieu" type="submit" value="{{$gio->batdau}}">{{$gio->batdau}} </button>

                                @endforeach

                                </div>
                            </div>
                        </form>
                        </div>
                    @endforeach
                    

                </section>
               
                <div class="back">
                    <a href="#" onclick="goBack()" > Quay lại</a>                    
                </div>
        </td>
        <td class="right-col ">
            <div class="ticket-info">
                <h4 class="top-30">THÔNG TIN VÉ</h4>
            </div>
            <table class="table2">
                <tbody>
                    <tr>
                        <td>Phim</td>
                        <td>{{$phimDaChon->first()->tenphim}}</td>
                    </tr>
                    <tr>
                        <td>Rạp</td>
                        <td>{{$rapDaChon->first()->tenrap}}</td>
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