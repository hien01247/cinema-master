@extends('layouts.master')
@section('contain')
<div class="header">
    <h1>Mua vé{{$maphong}}</h1>
</div>
<table class="buy-ticket">
    <tr>
        <td class="left-col">
            <div class="container">
                    <p>
                        <button class="btn btn-pick"></button> Ghế chọn </p>
                    <p>
                        <button class="btn btn-empty" disabled></button> Ghế trống</p>
                    <p>
                        <button class="btn btn-picked"></button> Ghế có người ngồi</p>
                    <hr>
                    <div class="seat">
                        <div>
                            <h2 class="screen">MÀN HÌNH</h2>
                        </div>
                        <table id="seatsBlock">
                            <tr>
                                <td></td>
                                <td> 1</td>
                                <td> 2</td>
                                <td> 3</td>
                                <td> 4</td>
                                <td> 5</td>
                                <td> 6</td>
                                <td> 7</td>
                                <td> 8</td>
                                <td> 9</td>
                                <td>10</td>
                                <td>11</td>
                                <td>12</td>
                            </tr>
                            @foreach($tatcaghe as $ghe)
                            @if($ghe->soghe == "A1")
                            <tr>
                                <td>A</td>
                            @endif

                            @if($ghe->soghe == "B1")
                            <tr>
                                <td>B</td>
                            @endif

                            @if($ghe->soghe == "C1")
                            <tr>
                                <td>C</td>
                            @endif

                            @if($ghe->soghe == "D1")
                            <tr>
                                <td>D</td>
                            @endif

                            @if($ghe->soghe == "E1")
                            <tr>
                                <td>E</td>
                            @endif
                            @if($ghe->soghe == "F1")
                            <tr>
                                <td>F</td>
                            @endif

                            @if($ghe->soghe == "G1")
                            <tr>
                                <td>G</td>
                            @endif

                            @if($ghe->soghe == "H1")
                            <tr>
                                <td>H</td>
                            @endif

                            @if($ghe->soghe == "I1")
                            <tr>
                                <td>I</td>
                            @endif

                            @if($ghe->soghe == "J1")
                            <tr>
                                <td>J</td>
                                <td>
                                        @if($ghe->tinhtrang == "1")
                                        <input type="checkbox" class="redBox" checked value="{{$ghe->soghe}}">
                                        @else 
                                        <input type="checkbox" class="seats" value="{{$ghe->soghe}}">
                                        @endif
                                </td>   
                            
                            @elseif($ghe->soghe == "J12")
                                <td>
                                    @if($ghe->tinhtrang == "1")
                                    <input type="checkbox" class="redBox" checked value="{{$ghe->soghe}}">
                                    @else 
                                    <input type="checkbox" class="seats" value="{{$ghe->soghe}}">
                                    @endif
                                </td> 
                            
                            @else
                                <td>
                                        @if($ghe->tinhtrang == "1")
                                        <input type="checkbox" class="redBox" checked value="{{$ghe->soghe}}">
                                        @else 
                                        <input type="checkbox" class="seats" value="{{$ghe->soghe}}">
                                        @endif
                                </td>  
                            @endif

                            @endforeach

                           
                        </table>
                        <div>
                            <input type="hidden" id="giaghe" value="{{$giaghe}} ">
                            <input type="hidden" id="giadv" value="{{$giadv}} ">
                            <button onclick="updateTextArea()">Xác nhận chọn ghế</button>
                            <input type="text" id="seatsDisplay" value="" disabled>
                            <input type="text" id="seatsDisplayBill" value="" disabled>
                        </div>
                </div>
            </div>
            
            <form action="{{route('thanhtoan')}} " method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="idphim" value="{{$phimDaChon->first()->maphim}}">
                <input type="hidden" name="idrap" value="{{$rapDaChon->first()->marap}}">
                <input type="hidden" name="ngay" value="{{$ngay}}  ">
                <input type="hidden" name="gio" value="{{$gio}}  ">
                <input type="hidden" name="loaiphong" id="loaiphong" value="{{$loaiphong}} ">
                <input type="hidden" name="tongcong" id="tongcong" value="">
                <input type="hidden" name="gheso" id="gheso" value="">
                    <a href="index" class="cancel"> Hủy bỏ giao dịch</a>
                    <button type="submit" id="db_btn"  disabled >Bước kế</button>
            </form>
        </td>
        <td class="right-col ">
            <div class="ticket-info">
                <h4 >THÔNG TIN VÉ</h4>
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
<script src="sources/js/jquery-2.2.3.min.js"></script>

<script>
    $("[type='number']").keypress(function (evt) {
        evt.preventDefault();
    });
    var globalt = 0;
    function updateTextArea() {
        if ($("input.seats:checked").length) {
            $(".seatStructure *").prop("disabled", true);
            $("#db_btn").prop("disabled", false);
            var allSeatsVals = [];
            
            $('input.seats:checked').each(function () {
                allSeatsVals.push($(this).val());
            });

            var giaghe = document.getElementById("giaghe").value;
            var giadv = document.getElementById("giadv").value;
            $('#seatsDisplay').val(allSeatsVals);
            $('#seatsDisplayBill').val(parseFloat( allSeatsVals.length*giaghe) + " VNĐ" );
            $('#gheso').val(allSeatsVals);
            $('#tongcong').val(parseFloat(parseFloat( allSeatsVals.length*giaghe) +parseFloat( giadv)) + " VNĐ")
        } else {
            alert("Bạn chưa chọn ghế")
        }
    }

    function alert1(){
        alert('Bạn chưa xác nhận chọn ghế');
    }
</script>
@endsection