@extends('layouts.master')
@section('contain')
<div class="header">
    <h1>Mua vé</h1>
</div>
<table class="buy-ticket">
    <tr>
        <td class="left-col">
            <table id="table1" class="table-dv">
                <thead>
                    <tr>
                        <th >Dịch vụ</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th colspan="2">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <form id="forms" onsubmit="return false;">
                        @foreach($dichvu as $dv)
                        <tr>
                            <td>
                                <a>{{$dv->tendv}} </a>
                            </td>
                            <td>
                                <input id="soluong_{{$dv->madv}}" class="cacsl" type="number" value="0" step="1" min="0" max="10" style="font: 20pt Courier">
                            </td>
                            <td>
                                <input type="text" class="form-control" id="gia_{{$dv->madv}}" value="{{$dv->gia}}" disabled>
                            </td>
                            <td colspan="2">
                                <input type="text" class="form-control" id="tong_{{$dv->madv}}" value="" disabled>
                            </td>
                        </tr>
                        @endforeach
                    </form>

                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">Tổng</th>
                        <th colspan="2">
                            <input id="tong" type="text" class="form-control" value="" disabled>
                        </th>
                    </tr>
                </tfoot>
            </table>
            <table class="table-p">
                <thead>
                    <tr>
                        <th colspan="2">Loại phòng</th>
                        <th> Đơn giá</th>
                    </tr>
                </thead>
                <tr>

                    <td>
                        <select name="loaiphong" id="chonlp" onchange="giveSelection(this.value)" >
                            <option value="--" selected hidden></option>
                            @foreach($loaiphong as $lp)
                            <option value="{{$lp->tenloai}}" >{{$lp->tenloai}}</option>
                            @endforeach
                        </select>    
                    </td>
                    <td></td>                                   
                     
                    <td>
                        <input type="text" class="form-control" id="displayGiaphong" value="" disabled>
                        @foreach($loaiphongall as $lp)
                        <input type="hidden" class="form-control" id="gia_{{$lp->tenloai}}" value="{{$lp->gia}}" >
                        @endforeach
                    </td>

                </tr>
            </table>
            <form action="{{route('chon-ghe')}} " method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="idphim" value="{{$phimDaChon->first()->maphim}}">
                <input type="hidden" name="idrap" value="{{$rapDaChon->first()->marap}}">
                <input type="hidden" name="ngay" value="{{$ngay}}  ">
                <input type="hidden" name="gio" value="{{$gio}}  ">
                <input type="hidden" name="loaiphong" id="loaiphong" value="">
                <input type="hidden" name="giaghe" id="giaghe" value="">
                <input type="hidden" name="giadv" id="giadv" value="">
                    <a href="index" class="cancel"> Hủy bỏ giao dịch</a>
                    <button type="submit" id="db_btn" disabled >Bước kế</button>
            </form>
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
                        <td>{{$ngay}} | {{$gio}}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="align-center"><button type="submit" disabled>Thanh toán</button></td>
                    </tr>
                </tbody>
            </table>    
        </td>
    </tr>
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>

        $("[type='number']").keypress(function (evt) {
            evt.preventDefault();
        });
        var globalt = 0;

        var cacsl = document.getElementsByClassName("cacsl");
        var num = cacsl.length;
        var soluong = [];
        for (i = 1; i <= num; i++) {
            soluong.push('#soluong_' + i);
        }
        var getTotal = function () {
            var tong = [];
            document.getElementById("tong").value = 0;
            for (i = 1; i <= num; i++) {
    
                var soluong = document.getElementById("soluong_" + i).value;
    
                var dongia = document.getElementById("gia_" + i).value;
                tong.push(soluong * dongia);
                var thanhtien = document.getElementById("tong_" + i).value = soluong * dongia + " VNĐ";
    
    
            }
            const reducer = (accumulator, currentValue) => accumulator + currentValue;
            globalt = tong.reduce(reducer) ;
            document.getElementById("tong").value = tong.reduce(reducer) + " VNĐ";
        }
        var lp = document.querySelector('#chonlp');
    
        function giveSelection(chonlp) {
            var x = document.getElementById('gia_'+ lp.value).value;
            
            document.getElementById("displayGiaphong").value = x + " VNĐ";
            document.getElementById("giaghe").value = parseInt( x);
            document.getElementById("giadv").value = parseInt( globalt);
            document.getElementById("loaiphong").value = lp.value;
            document.getElementById("db_btn").disabled = false;
        }
    
    
        
    
        var calculate = function () {
            var temp, i = 1;
            do {
                temp = document.getElementById("soluong_" + i).onchange = getTotal;
                i++;
            } while (temp);
            calculate();
        };
        window.onload = calculate;
    </script>
    
    @endsection