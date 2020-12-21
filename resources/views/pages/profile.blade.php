@extends('layouts.master')
@section('contain')
<div class="header">
    <h1>Tài khoản của tôi</h1>
</div>


@if(count($errors) > 0)

@foreach($errors->all() as $err)
<div role="alert" class=" alert alert-danger">
   {{$err}}
   <br>   
</div>
@endforeach

@endif

<table class="buy-ticket">
    <tr>
        <td class="left-col">
            <div class="heading">
                <h3>Thông tin cá nhân</h3>
            </div>
            <table class="info">
            <form action="{{route('changePersonalData')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <tr> 
                    <td><label for="name">Họ Tên(*)</label></td>
                    <td><input name="name" id="name" type="text" class="form-control" value="{{Auth::user()->name}}"></td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><input name="email" id="email" type="text" class="form-control" value="{{Auth::user()->email}}" disabled></td>
                </tr>
                <tr>    
                    <td><label for="ngaysinh">Ngày sinh</label></td>
                    <td><input type="text" name="ngaysinh" id="ngaysinh" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" value="{{Auth::user()->ngaysinh}}">  </td>                                      
                </tr>
                <tr>    
                    <td><label for="gioitinh">Giới tính</label></td>
                    <td><select name="gioitinh" id="gioitinh" class="form-control" required="required">                                            
                        <option value="1">Nam</option>
                        <option value="0">Nữ</option>                                           
                    </select></td>
                </tr>
                <tr>
                    <td><label for="sodt">Số điện thoại</label></td>
                    <td><input type="tel" name="sodt" id="sodt" class="autocomplete form-control" value="{{Auth::user()->sodt}}" ></td>
                </tr>
                <tr>    
                    <td><label for="cmnd">Chứng minh thư</label></td>
                    <td><input name="cmnd" id="cmnd" type="number" class="form-control" value="{{Auth::user()->cmnd}}" disabled></td>
                </tr>
                <tr>    
                    <td colspan="2">
                    <label>
                        <input id="want" type="checkbox" name="subscribe" onclick="myFunction()" /> Tôi muốn đổi mật khẩu
                    </label>
                    <div id="changepas" style="display: none;">
                        <div>
                            <div>
                                <input type="password" name="password_old" id="password_old" placeholder="Mật khẩu hiện tại" disabled>

                            </div>
                        </div>
                        <div>
                            <div>
                                <input type="password" name="password" id="password"placeholder="Mật khẩu mới" disabled>
                            </div>
                        </div>
                        <div>
                            <div>
                                <input type="password" name="re_password" id="re_password" placeholder="Xác nhận lại mật khẩu" disabled>
                            </div>
                        </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit">Lưu thay đổi</button>
                    </td>
                </tr>
            </form>
            </table>
        </td>
        <td class="right-col">
            <div class="list">
                <ul>
                    <li class="active">
                        <a >Thông tin cá nhân</a>
                    </li>    
                    <li>
                        <a href="{{route('lich-su')}}">Lịch sử giao dịch</a>
                    </li>
                </ul>           
            </div>
        </td>
    </tr>
    </table>
       

@endsection