<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
     protected $table="nhan_vien";

     public function hoadon(){
    	return $this->hasMany('App\Bill_Nhap','id_nhanvien','id');
    }
}
