@extends('admin') @section('content1')
<style type="text/css" media="">
    #inport{
        margin-right: 10px;
    }
</style>
{{-- <script  type="text/javascript" charset="utf-8" async defer>
    $(document).ready(function(){
        alert('hello');
    });
    function sua(id){
        alert(id);
    }

</script> --}}
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">THỰC PHẨM SẠCH</span></h4>
        </div>
      @include('error_message')
      <div class="heading-elements">
            <div class="heading-btn-group">
                <a href="{{ route('ds-sp-all')  }}" class="btn btn-info"><i class="fas fa-backward"></i>&nbsp;Quay lại</a>
            </div>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
            <li><a href="admin.html">Tables</a></li>
        </ul>

    </div>
</div>
<!-- /page header -->
<!-- Content area -->
<div class="content">

    <!-- Basic initialization -->
    <div class="panel panel-flat">
        <div class="panel-heading">
           
            <div class="heading-elements">
                <ul class="icons-list">
                    <li>
                        <a data-action="collapse"></a>
                    </li>
                    <li>
                        <a data-action="reload"></a>
                    </li>
                    <li>
                        <a data-action="close"></a>
                    </li>
                </ul>
            </div>
        </div>
        <style>
            #tb_admin img {
                width: 70px;
                height: 70px;
            }
        </style>
        <form action="{{ route('searchSp') }}" method="get" accept-charset="utf-8">
        &nbsp; &nbsp;Tìm kiếm: &nbsp;<input type="text" id="ip_seach" name="key" value="" placeholder="  Seach... " class="animated inifinite bounceInDown" onkeyup="myFunction()" style="border:1px solid #AAA;margin-bottom: 15px;padding:5px"><br>
        </form>
        <table class="table datatable-autofill-basic" id="tb_admin">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Loại sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                   {{--  <th>Nhà cung cấp</th> --}}
                    <th>Đơn giá</th>
                   {{--  <th>Giá khuyến mại</th> --}}
                    <th>Đơn vị tính</th>
                    <th>Trạng thái</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                 @php
                $stt=0;
                if(isset($_GET['page'])){
                    $a=$_GET['page'];
                }
                else
                {
                    $a=1;
                }
                $stt=($a-1)*15;
                @endphp
                @foreach($sanpham as $sp)
                 @php $stt++;@endphp
                    <tr>
                        <td>{{$stt }}</td>
                        <td>{{ $sp->name }}</td>
                        <td>
                         @foreach($loai as $loai_sp) @if($sp->id_loai_sp==$loai_sp->id)
                        {{ $loai_sp->tenloai }}
                        @endif @endforeach
                        </td>
                        <td><img src="upload/sanpham/{{ $sp->image }}" alt="" id="tdimg"></td>
                
                        <td style="color: red">{{ number_format($sp->unit_price,0,',','.') }}</td>
                        {{-- <td style="color: red">{{ $sp->gia_km }}</td> --}}
                        <td>{{ $sp->don_vi_tinh }}</td>
                        <td>@if($sp->new==1) New @endif</td>
                        <td>
                              <a href="{{ route('sua-san-pham1',$sp->id) }}" title="">
                            <button type="button" class="btn btn-primary" id="btn1">Sửa</button></a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal2{{ $sp->id }}" onclick="xoa()">Xóa</button>
                            <div id="myModal2{{ $sp->id }}" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Bạn có muỗn xóa sản phẩm {{ $sp->id }}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Some text in the modal.</p>
                                        </div>
                                        <div class="modal-footer">
                                           <a href="{{ route('xoa-san-pham1',$sp->id) }}" title=""><button type="button" class="btn btn-info btn-lg"><i class="fas fa-plus"></i>&nbsp; &nbsp;&nbsp;&nbsp;Có</button></a>
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </td>

                    </tr>

                   @endforeach
            </tbody>
        </table>
    </div>
    <div class="footer text-muted">
        &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
    </div>
</div>
{{-- @include('admin_page.SanPham.modal'); --}}
@endsection()