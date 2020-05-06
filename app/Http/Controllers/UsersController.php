<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;
use App\Bill_Ban;
class UsersController extends Controller
{
     public function getdangky(){
    	return view('page.dangky');
    } 
    public function postdangky(Request $req){
        $this->validate($req,
            [
            'fullname'=>'unique:users,full_name',
            'user_name'=>'unique:users,users_name',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5|max:20',
            're_password'=>'required|same:password'     
        ],
        [
            'fullname.unique'=>'Tên đã có người sử dụng.Bạn hãy đặt tên khác',
            'user_name.unique'=>'user name đã có người sử dụng.Bạn hãy đặt tên khác',
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'email.unique'=>'Email đã có người sử dụng',
            'password.required'=>'Vui lòng nhập maatk khẩu',
            're_password.same'=>'Mật khẩu không giống nhau',
            'password.min'=>'Mật khẩu ít nhất 6 kí tự'       
        ]);
        $user=new User();
        $user->full_name=$req->fullname;
        $user->users_name=$req->user_name;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->phone=$req->phone;
        $user->address=$req->address;
        $user->image='';
        $user->Delet=0;
        $user->save();
        return redirect()->back()->with('thanh cong','Tạo tài khoản thành công');
    }

      public function getds_tk(){
    	$taikhoan=User::where('Delet',0)->paginate(10);
    	return view('admin_page.User.user',compact('taikhoan'));
    }

    public function getsua(Request $req){
        $data=User::where('id',$req->id)->first();//first: lấy 1 sản phẩm
        // print_r($data);
        return view('admin_page.User.sua',compact('data'));
    }
    // public function postSua(Request $req,$id){
    //     $this->validate($req,
    //          [
    //         'fullname'=>'unique:users,full_name',
    //         'user_name'=>'unique:users,users_name',
    //         'email'=>'required|email|unique:users,email',
    //         'password'=>'required|min:5|max:20',
    //         're_password'=>'required|same:password'     
    //     ],
    //     [
    //         'fullname.unique'=>'Tên đã có người sử dụng.Bạn hãy đặt tên khác',
    //         'user_name.unique'=>'user name đã có người sử dụng.Bạn hãy đặt tên khác',
    //         'email.required'=>'Vui lòng nhập email',
    //         'email.email'=>'Không đúng định dạng email',
    //         'email.unique'=>'Email đã có người sử dụng',
    //         'password.required'=>'Vui lòng nhập maatk khẩu',
    //         're_password.same'=>'Mật khẩu không giống nhau',
    //         'password.min'=>'Mật khẩu ít nhất 6 kí tự'       
    //     ]);
    //     );
    //     $user=User::find($id);
    //     $user->full_name=$req->fullname;
    //     $user->users_name=$req->user_name;
    //     $user->email=$req->email;
    //     $user->password=Hash::make($req->password);
    //     $user->phone=$req->phone;
    //     $user->address=$req->address;
    //     $user->image='';
    //     $user->save();
    //     return redirect()->route('sua-user')->with(['flag'=>'success','tb'=>'Sửa thành công']);
    // }

     public function xoa(Request $req,$id){
            $user=User::find($id);
            $user->Delet=1;
            $user->save();
            return redirect()->route('ds-tk')->with(['flag'=>'success','tb'=>'Xóa thành công']);
         
    }
}
