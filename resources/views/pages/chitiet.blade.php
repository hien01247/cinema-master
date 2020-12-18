@extends('layouts.master') 
@section('contain')
<div class="header">
    <h1>{{$phim->first()->tenphim}}</h1>
</div>

<div class="details-movie">
    <div class="poster">
        <img src="{{$phim->first()->hinhanh}} " alt="" >
    </div>
    <div class="details">
        <table class="table1">
            <tr>
                <td>Đạo diễn: </td>
                <td>{{$phim->first()->daodien}}</td>
            </tr>
            <tr>
                <td>Thể loại: </td>
                <td>
                    @foreach($theloai as $th) {{$th->theloai}}, @endforeach
                </td>
            </tr>
            <tr>
                <td>Diễn viên: </td>
                <td>
                    @foreach($dienvien as $dv) {{$dv->dienvien}}, @endforeach
                </td>
            </tr>
            <tr>
                <td>Khởi chiếu: </td>
                <td>{{$phim->first()->batdau}}</td>
            </tr>
            <tr>
                <td>Thời lượng: </td>
                <td>{{$phim->first()->thoiluong}}</td>
            </tr>
            <tr>
                <td>Đối tượng: </td>
                <td>{{$phim->first()->doituong}}</td>
            </tr>
        </table>
        <hr>
        
        <table>
            <tr>
                @if ($phim->first()->batdau < $currentDate)
                <td>
                    <form action="{{route('chon-phim')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button name="idphim" type="submit" value="{{$phim->first()->maphim}}" class="btn btn-template-main">Đặt vé ngay</button>
                    </form>
                </td>
                @endif
                <td>
                    <a href="{{$phim->first()->trailer}}" target="_blank" class="btn btn-template-main" id="smaller">Trailer</a>
                </td>
            </tr>
        </table>      
        <div>
            <p class="lead">
                <b>Nội dung phim: </b>{{$phim->first()->mota}} 
            </p>
        </div> 
    </div> 
</div>
@endsection