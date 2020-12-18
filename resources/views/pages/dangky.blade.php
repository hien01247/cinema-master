@extends('layouts.master')
@section('contain')
<div class="header">
    <h1>ĐĂNG KÍ TÀI KHOẢN</h1>
</div> 
@if(count($errors) > 0) 
    @foreach($errors->all() as $err)

    {{-- <div role="alert" class=" alert alert-danger">
    {{$err}}
    <br>
    </div> --}}
    <div class="alert alert-danger">
            <strong>{{ $err }}</strong>
    </div>
@endforeach 
@endif 

<div id="signup" class="signup">
    <form action="{{route('dang-ky')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label for="email">Email (*)</label>
            <input name="email" type="text"  size="40"placeholder="Dùng để đăng nhập vào hệ thống"><br/>
        <label for="password">Mật khẩu (*)</label>
            <input name="password" type="password"  size="30" placeholder="Độ dài hợp lệ từ 6 tới 20 kí tự"><br/>
        <label for="re_password">Nhập lại mật khẩu (*)</label>
            <input name="re_password" type="password" size="30" ><br/> 
        <label for="name">Họ và tên</label>
            <input name="name" type="text" id="name" size="40"><br/>
        <label for="ngaysinh">Ngày sinh</label>
            <input name="ngaysinh" type="date" id="ngaysinh" data-date="" data-date-format="DD MMMM YYYY"><br/>
            
        <label for="gioitinh">Giới tính</label>
            <select name="gioitinh" id="gioitinh" ><br/>
                <option value="1" selected>Nam</option>
                <option value="0">Nữ</option>
            </select>
            <br/> 
        <label for="sodt">Số điện thoại</label>
            <input name="sodt" type="tel" id="sodt"  placeholder="+84"><br/>
        <label for="cmnd">Chứng minh thư</label>
            <input name="cmnd" id="cmnd" type="number" size="40" placeholder="Xin nhập đúng chứng minh thư"><br/>
            <input type="checkbox" name="agree" id="argree" /> Tôi đã đọc, hiểu và đồng ý với các
                    <strong>
                        <a href="faq">điều khoản</a> và 
                    </strong>
                    <strong>
                        <a href="faq">chính sách bảo mật</a>  của chúng tôi.
                    </strong><br/>                         
    
        <button type="submit" class="btn btn-template-outlined">
            <i class="fa fa-user-md"></i> Đăng ký
        </button>
    
</form>

@endsection