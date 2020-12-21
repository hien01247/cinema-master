<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use App\User;
use App\phim;
use App\rap_chieu;
use App\suat_chieu;
use App\khung_gio;
use App\khuyen_mai;
use App\dien_vien;
use App\dich_vu;
use App\su_dung_dich_vu;
use App\the_loai;
use App\loai_phong;
use App\loai_ghe;
use App\phong_chieu;
use App\ghe_ngoi;
use App\hoa_don;
use App\ve;
use Auth;
use Carbon;
use Redirect;
use Session;

class PageController extends Controller
{ 
    public function getIndex()
    {
        $currentDate = Carbon\Carbon::now()->toDateString();
        $pre_phim = phim::where('batdau','>',$currentDate)->take(6)->get();
        $new_phim = phim::where('batdau','<',$currentDate)->take(6)->get();

        return view('pages.home', compact('new_phim','pre_phim'));
    }
    
    public function getProfile()
    {
        return view('pages.profile');
    }

    public function getLichSu()
    {     
        $user_id = Auth::user()->id;                       
        $hoadon = hoa_don::where('idkh',$user_id)->get();
        
        return view('pages.lichsu',compact('hoadon'));
    }

    public function postChiTietLichSu(Request $req)
    {
        $hoadon = hoa_don::where('mahoadon',$req['idhoadon'])->get();
        $ve = ve::where('mahoadon',$req['idhoadon'])->get();
        $sddv= su_dung_dich_vu::where('mahoadon',$req['idhoadon'])->get();
        $suatchieu = suat_chieu::where([
            ['masuatchieu',$ve->first()->masuatchieu],
        ]);
        $soghe = [];
        foreach($ve as $v){
            $temp = ghe_ngoi::where('maghe',$v->maghe);
            $soghe[] = ($temp->first()->soghe);
        }
        $phim = phim::where('maphim',$suatchieu->first()->maphim);
        $rap = rap_chieu::where('marap',$suatchieu->first()->marap);
        $khunggio = khung_gio::where('makhunggio',$suatchieu->first()->makhunggio);
        return view('pages.chitietlichsu',compact('ve','hoadon','phim','rap','soghe','khunggio','suatchieu'));
    }

    public function postchangePersonalData(Request $req)
    {
        $this->validate($req,
            [
                'name'=>'regex:/(^([a-zA-Z\sàáâãèéêìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ]*)$)/|max:50',
                'ngaysinh'=> 'after:"1950-01-01"',
                'sodt'=>'numeric|digits_between:10,11',
                
            ],
            [
                'name.regex'=>'Tên không được chứa số hoặc ký tự đặc biệt',              
                'name.max'=>'Tên không được vượt quá 50 ký tự',
                'ngaysinh.after'=>'Ngày sinh không hợp lệ',
                'sodt.numeric'=>'Số điện thoại không hợp lệ',
                'sodt.digits_between'=>'Số điện thoại không hợp lệ',
                
            ]);
        
        $user_id = Auth::user()->id;                       
        $obj_user = User::find($user_id);
        $obj_user->name = $req['name'];
        $obj_user->ngaysinh = $req['ngaysinh'];    
        $obj_user->gioitinh = $req['gioitinh'];       
        $obj_user->sodt = $req['sodt'];
        if (is_null($req['password']) && is_null($req['password_old']) && is_null($req['re_password'])) 
        {
            $obj_user->save(); 
            return redirect()->back()->with('success','Thay đổi thông tin thành công');
        } 
        else 
        {   
            $this->validate($req,
                [
                    'password_old'=>'required',
                    'password'=>'required|min:6|max:20',
                    're_password'=>'required|same:password'
                ],
                [      
                    'password_old.required'=>'Vui lòng nhập mật khẩu hiện tại! ',
                    'password.required'=>'Vui lòng nhập mật khẩu mới! ',
                    're_password.required'=>'Vui lòng nhập lại mật khẩu mới! ',
                    're_password.same'=>'Mật khẩu mới không trùng khớp! Vui lòng thử lại ',
                    'password.max'=>'Mật khẩu tối đa 20 kí tự! ',
                    'password.min'=>'Mật khẩu cần ít nhất 6 kí tự! '
                ]
            );      
            if(Hash::check($req['password_old'], Auth::user()->password))
            {
                $obj_user->password = Hash::make($req['password']);
                $obj_user->save(); 
                return redirect()->back()->with('success','Đổi mật khẩu/thông tin thành công');
            }
            else
            {
                $obj_user->save();
                return redirect()->back()->with('error','Mật khẩu hiện tại không đúng');
            }
        }      
    }
    
    public function getDangKy()
    {
        return view('pages.dangky');
    }
    public function postSignup(Request $req)
    {
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',                
                're_password'=>'required|same:password',
                'name'=>'required|regex:/(^([a-zA-Z\sàáâãèéêìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ]*)$)/|max:50',
                'ngaysinh'=> 'after:"1950-01-01"',
                'gioitinh'=>'required',
                'sodt'=>'numeric|digits_between:10,11',
                'cmnd'=>'numeric|digits:9|unique:users,cmnd',
                'agree'=>'required'
            ],
            [
                'email.required'=>'Vui lòng nhập email! ',
                'email.email'=>'Địa chỉ email vừa nhập không đúng! ',
                'email.unique'=>'Địa chỉ email đã được sử dụng! ',                
                'password.required'=>'Vui lòng nhập mật khẩu! ',
                're_password.required'=>'Vui lòng nhập lại mật khẩu! ',
                're_password.same'=>'Mật khẩu nhập lại không khớp! ',
                'password.max'=>'Mật khẩu cần ít nhất 6 và tối đa 20 kí tự! ',
                'password.min'=>'Mật khẩu cần ít nhất 6 và tối đa 20 kí tự! ',
                'name.required'=>'Vui lòng nhập tên! ',
                'name.regex'=>'Tên không được chứa số hoặc ký tự đặc biệt',              
                'name.max'=>'Tên không được vượt quá 50 ký tự',
                'ngaysinh.after'=>'Ngày sinh không hợp lệ',
                'sodt.numeric'=>'Số điện thoại không hợp lệ',
                'sodt.digits_between'=>'Số điện thoại không hợp lệ',
                'cmnd.numeric'=>'Chứng minh nhân dân vừa nhập không hợp lệ',
                'cmnd.digits'=>'Chứng minh nhân dân vừa nhập không hợp lệ',
                'cmnd.unique'=>'Chứng minh nhân dân này đã được sử dụng',
                'agree.required'=>'Vui lòng đọc và đồng ý với các điều khoản sử dụng!'
            ]);
        
        $obj_user = new User();
        $obj_user->email = $req->email;
        $obj_user->password = Hash::make($req->password);
        $obj_user->name = $req['name'];
        $obj_user->ngaysinh = $req['ngaysinh'];    
        $obj_user->gioitinh = $req['gioitinh'];       
        $obj_user->sodt = $req['sodt'];
        $obj_user->cmnd = $req['cmnd'];
        $obj_user->save();
        return redirect()->route('trang-chu')->with('success','Tạo tài khoản thành công, vui lòng đăng nhập lại');
    }

    public function postSignin(Request $req)
    {
        $credentials = array('email'=>$req->email,'password'=>$req->password);
        if (Auth::attempt($credentials))
        {
            return redirect('/')->with('success','Đăng nhập thành công');
        }
        else
        {
            return redirect('/')->with('error','Đăng nhập thất bại');
        }       
    }

    public function getDangxuat()
    {
        Auth::logout();
        return redirect()->route('trang-chu');
    }
    
    public function contact()
    {
        return view('pages.contact');
    }
    
    public function heThongRap()
    {
        $rap = rap_chieu::all();
        return view('pages.hethongrap',compact('rap'));
    }
    
    public function phimDangChieu()
    {
        $currentDate = Carbon\Carbon::now()->toDateString();
        $phim = phim::where('batdau','<',$currentDate)->get();
        return view('pages.phimdangchieu',compact('phim'));
    }   
    public function phimSapChieu()
    {
        $currentDate = Carbon\Carbon::now()->toDateString();
        $phim = phim::where('batdau','>',$currentDate)->get();
        return view('pages.phimsapchieu',compact('phim'));
    }
    public function getChitiet($idPhim)
    {   
        $currentDate = Carbon\Carbon::now()->toDateString();    
        $phim = phim::where('maphim',$idPhim)->get();
        $dienvien = dien_vien::where('maphim',$idPhim)->get();
        $theloai = the_loai::where('maphim',$idPhim)->get();
        return view('pages.chitiet',compact('phim','dienvien','theloai','currentDate'));
    }
    
    public function getKhuyenMai(){
        $khuyenmai = khuyen_mai::all();
        return view('pages.khuyenmai',compact('khuyenmai'));
    }

    public function getMuaVeMenu()
    {
        $currentDate = Carbon\Carbon::now()->toDateString();
        $phim = phim::where('batdau','<',$currentDate)->get();
        $rap = rap_chieu::all();
        $khung_gio = khung_gio::all();
        return view('pages.chonphimve',compact('phim','rap','khung_gio'));
    }
    
    public function postChonPhim(Request $req)
    {
        $phimDaChon = phim::where('maphim',$req['idphim'])->get();
        return view('pages.chonphim',compact('phimDaChon'));
        
    }

    public function postChonRap(Request $req)
    {
        if(Auth::user()){
        $phimDaChon = phim::where('maphim',$req['idphim'] )->get();
        //dd($phimDaChon);
        $rap = rap_chieu::all();
        return view('pages.chonrap',compact('phimDaChon','rap'));
        }else{
        return redirect('/')->with('error','Bạn cần đăng nhập để mua vé');
        }
    }

    public function postChonSuatChieu(Request $req)
    {
        $phimDaChon = phim::where('maphim',$req['idphim'])->get();
        $rapDaChon = rap_chieu::where('marap',$req['idrap'])->get();
        
        
        $suatchieu = suat_chieu::where([
            ['maphim','=',$req['idphim']],
            ['marap','=', $req['idrap']]
        ])->select('ngaychieu')->distinct()->get();


        $currentDate = Carbon\Carbon::now()->toDateString();
        $kgtungngay = [];
        foreach($suatchieu as $sc){
            if($sc->ngaychieu < $currentDate) continue;
            $kgtungngay[] = suat_chieu::join('khung_gio','suat_chieu.makhunggio','khung_gio.makhunggio')
            ->where([
                ['ngaychieu',$sc->ngaychieu],
                ['maphim','=',$req['idphim']],
                ['marap','=', $req['idrap']]
                ])->select('ngaychieu','batdau')->distinct()->get();
        }
        return view('pages.chonsuatchieu',compact('phimDaChon','rapDaChon','kgtungngay'));

    }

    public function postMuaVe(Request $req)
    {
        $loaiphongall = loai_phong::all();
        $loaighe = loai_ghe::all();
        $dichvu = dich_vu::all();
        $phimDaChon = phim::where('maphim',$req['idphim'])->get();
        $rapDaChon = rap_chieu::where('marap',$req['idrap'])->get();
        $ngay = $req['ngaychieu'];
        $gio = $req['giochieu'];
        $makg = khung_gio::where('batdau',$gio)->value('makhunggio');
        $temp = DB::table('suat_chieu')->where([
            ['ngaychieu', $ngay],
            ['makhunggio', $makg],
            ['maphim', $req['idphim']],
            ['marap',$req['idrap']],
        ])->get();
        $loaiphong = [];
        foreach($temp as $t){
            $a=phong_chieu::where('maphong',$t->maphong);
            $loaiphong[]=$a->first();
        }
        return view('pages.muave',compact('phimDaChon','rapDaChon','ngay','gio','dichvu','loaiphong','loaighe','loaiphongall','makg','temp') );

    }

    public function postChonGhe(Request $req)
    {
        $dichvu = dich_vu::all();
        $giochieu = khung_gio::where('batdau','=',$req['gio'])->first();
        $makhunggio=$giochieu['makhunggio'];
        $loaiphong = $req['loaiphong'];
        $maphong=phong_chieu::where([
            ['marap',$req['idrap']],
            ['tenloai',$loaiphong],
        ])->value('maphong');
        $masuatchieu = suat_chieu::where([
        ['ngaychieu',$req['ngay']],
        ['makhunggio',$makhunggio],
        ['maphim',$req['idphim']],
        ['maphong',$maphong],
        ])->first();
        $tatcaghe = ghe_ngoi::where('masuatchieu',$masuatchieu['masuatchieu'])->get();
        $phimDaChon = phim::where('maphim',$req['idphim'])->get();
        $rapDaChon = rap_chieu::where('marap',$req['idrap'])->get();
        $ngay = $req['ngay'];
        $gio = $req['gio'];
        $giaghe = $req['giaghe'];
        $giadv = $req['giadv'];
        return view('pages.chonghe',compact('phimDaChon','loaiphong','rapDaChon','ngay','gio','dichvu','tatcaghe','giaghe','giadv','maphong') );
    }

    public function postThanhToan(Request $req)
    {
        $currentDate = Carbon\Carbon::now()->toDateString();
        $dichvu = dich_vu::all();
        $phong = phong_chieu::where([
            ['marap',$req['idrap']],
            ['loaiphong',$req['loaiphong']]
        ])->get();
        
        $gheso = $req['gheso'];
        $phimDaChon = phim::where('maphim',$req['idphim'])->get();
        $rapDaChon = rap_chieu::where('marap',$req['idrap'])->get();
        $ngay = $req['ngay'];
        $gio = $req['gio'];
        $loaiphong = $req['loaiphong'];
        $tongcong = $req['tongcong'];
        $user_id = Auth::user()->id;                       
        $hoadon = new hoa_don();
        
        $hoadon->tongtien = $tongcong;
        $hoadon->ngayxuat = $currentDate;
        $hoadon->idkh = $user_id;
        $hoadon->save();
            
            $hoadonx = DB::table('hoa_don')->latest('mahoadon')->limit(1);
            
            $cacghe = explode(",", $gheso);
            
            
            foreach($cacghe as $ghe1){
                $ve = new ve();
                $makg = khung_gio::where('batdau',$gio)->get();
                $temp = suat_chieu::where([
                    ['ngaychieu', $ngay],
                    ['makhunggio', $makg->first()->makhunggio],
                    ['maphim', $req['idphim']],
                    ['marap',$req['idrap']],
                ])->get();
                $ve->masuatchieu = $temp->first()->masuatchieu;
                $ghe = ghe_ngoi::where([
                    ['masuatchieu',$temp->first()->masuatchieu],
                    ['soghe', $ghe1],
                ])->get();
                $ve->maghe = $ghe->first()->maghe;
                $ve->mahoadon = $hoadonx->first()->mahoadon;
                $ve->save();

                DB::table('ghe_ngoi')->where('maghe', $ghe->first()->maghe)->update(['tinhtrang'=>1]);
                
            }

            return view('pages.thanhtoan',compact('phimDaChon','rapDaChon','ngay','gio','dichvu','gheso','tongcong','loaiphong','phong') );

        
    }
    public function getSearch(Request $req){
        $phim=phim::where('tenphim','like','%'.$req->search.'%')->get();
        return view('pages.search',compact('phim'));
    }
}