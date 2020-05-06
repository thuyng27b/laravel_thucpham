<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class KhachHangController extends Controller
{
     public function getds_kh(){
    	$khachhang=Customer::paginate(10);
    	return view('admin_page.KhachHang.khachhang',compact('khachhang'));
    }
}
