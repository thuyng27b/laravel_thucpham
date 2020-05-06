<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LoaiSanPham;
use App\sanpham;
use App\Nhacungcap;
use App\User;
use App\PhanHoi;
use Excel;
use App\Exports\SanPhamExport;
use App\Imports\SanPhamImport;
use App\Bill_Detail_ban;

class SanPhamController extends Controller
{

    public function getds_sp_all(Request $req){
        $loai=LoaiSanPham::all();
        $sanpham=sanpham::where('Delet',0)
                        ->paginate(15);
        $nhacungcap=Nhacungcap::all();
       return view('admin_page.SanPham.all',compact('loai','sanpham','nhacungcap'));
    }

    public function getThem1(){
        $nhacungcap=Nhacungcap::all();
        $loaisp=LoaiSanPham::all();
        return view('admin_page.SanPham.them',compact('nhacungcap','loaisp'));
    }

    public function postThem1(Request $req){
        $this->validate($req,
            [
            'tensp'=>'unique:san_pham,name'
            ],
            [
            'tensp.unique'=>'Tên sản phẩm đã có'
            ]);
        $sp=new sanpham;
        $sp->name=$req->tensp;
        $sp->id_loai_sp=$req->id_loai;
        $sp->id_ncc=$req->ncc;
        $sp->mota_sp=$req->mota;
        $sp->unit_price=$req->dongia;
        $sp->gia_km=null;
        $sp->so_luong=$req->soluong;
        $sp->image=$req->img;
        $sp->don_vi_tinh=$req->don_vi_tinh;
        $sp->Delet=0;
        $sp->new=1;
        $loai=LoaiSanPham::find($req->id_loai);
        $loai->Delet=2;
        $loai->save();
        $ncc=Nhacungcap::find($req->ncc);
        $ncc->Delet=2;
        $ncc->save();
        $sp->save();
        return redirect()->route('ds-sp-all')->with(['flag'=>'success','tb'=>'Thêm thành công']);
    }

    public function getSua1(Request $req){
        $sp=sanpham::where('id',$req->id)->first();//first: lấy 1 sản phẩm
        $loaisp=LoaiSanPham::all();
        $nhacungcap=Nhacungcap::all();
        return view('admin_page.SanPham.sua',compact('sp','loaisp','nhacungcap'));
    }

     public function postSua1(Request $req,$id){
        $sp=sanpham::find($id);
        $sp->name=$req->tensp;
        $sp->id_loai_sp=$req->id_loai;
        $sp->id_ncc=$req->ncc;
        $sp->mota_sp=$req->mota;
        $sp->unit_price=$req->dongia;
        $sp->gia_km=$req->giakm;
        $sp->don_vi_tinh=$req->don_vi_tinh;
        $sp->new=$req->new;

         if($req->hasFile('txtfile'))
        {
            $file= $req->file('txtfile');
            $duoifile = $file->getClientOriginalExtension(); //lấy tên hình ra
            if($duoifile != 'jpg' && $duoifile != 'png' && $duoifile != 'jpeg'){
                return redirect()->route('ds-sp-all')->with(['flag'=>'success','tb'=>"Bạn chỉ được chọn file có đuôi jpg, png, jpeg"]);
            }
            $name = $file->getClientOriginalName(); //lấy tên gốc hình ra
            //đặt tên không trùng
            $hinh = str_random(4)."_".$name; 
            while(file_exists("upload/sanpham".$hinh)){
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/sanpham",$hinh); //lưu
            $sp->image = $hinh;
           
        }
        $sp->save();
      return redirect()->route('ds-sp-all')->with(['flag'=>'success','tb'=>'Sửa thành công']);
    }

    public function xoa1(Request $req,$id){
        $sanpham=Bill_Detail_ban::where('id_sp',$req->id)->count();
        if($sanpham==0){
              // $loai2=sanpham::where('id',$req->id)->delete();
            $sp=sanpham::find($id);
            $sp->Delet=1;
            $sp->save();
            return redirect()->route('ds-sp-all')->with(['flag'=>'success','tb'=>'Xóa thành công']);
         }else{
    echo "<script type='text/javascript'>
    alert('Xin lỗi !Bạn không thể xóa sản phẩm này do trong sản phẩm đã có trong phần đơn hàng');
    window.location='";
    echo route('ds-sp-all');
    echo"'
    </script>";
  }
    }

    public function getSearch(Request $req){
        $loai=LoaiSanPham::all();
        $loai2=LoaiSanPham::where('tenloai','like','%'.$req->key.'%')->first();
        $nhacungcap=Nhacungcap::all();
        $sanpham=sanpham::where('name','like','%'.$req->key.'%')
                            // ->orwhere('unit_price',$req->key)
                            // ->orwhere('don_vi_tinh','like','%'.$req->key.'%')
                            ->orwhere('id_loai_sp',$loai2->id)
                           
                            ->get();
        return view('admin_page.SanPham.sp',compact('loai','sanpham','nhacungcap'));
    }

    //export
    public function export(){
        return Excel::download(new SanPhamExport(),'sanpham.xlsx');
    }
    //import
    public function import(Request $req){

         Excel::import(new SanPhamImport(), $req->file('import_file'));
        return redirect()->route('ds-sp-all')->with(['flag'=>'success','tb'=>'inport thành công']);;
    }
}
