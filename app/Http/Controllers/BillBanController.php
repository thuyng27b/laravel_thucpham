<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill_Ban;
use App\Bill_Detail_ban;
use App\Customer;
use App\sanpham;

class BillBanController extends Controller
{
     public function getds_hd(){
    	$hoadonBan=Bill_Ban::orderBy('status','1')->paginate(10);
    	$khachhang=Customer::all();
    	return view('admin_page.HoaDonBan.hoadon_ban',compact('hoadonBan','khachhang'));
    }

    public function getct_hd(Request $req){
    	$ct_hd=Bill_Detail_ban::where('id_bill_ban',$req->id)->get();
    	$sanpham=sanpham::all();
    		return view('admin_page.HoaDonBan.ct_hoadon',compact('ct_hd','sanpham'));
    }
    public function duyet($id){
         $bill=Bill_ban::find($id);
         $bill->status=0;
         $bill->save();
         return redirect()->back();
    }
}
