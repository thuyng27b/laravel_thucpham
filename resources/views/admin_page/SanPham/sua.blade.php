@extends('admin') @section('content1')
<style>
    #tb_them td {
        width: 400px;
        padding-right: 30px;
        padding-left: 30px;
        padding-top: 15px;
    }
</style>
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">THỰC PHẨM SẠCH</span></h4>
        </div>
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

        <style>
            #tb_admin img {
                width: 70px;
                height: 70px;
            }
        </style>
        <table class="table datatable-autofill-basic" id="tb_admin">
            <thead>
                <tr>
                    <th style="text-align: center">Sửa sản phẩm</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <form action="suasp1/{{ $sp->id}}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <table id="tb_them">
                                    <tr>
                                        <td>
                                            <span>Tên sản phẩm: </span>
                                            <br>
                                            <input type="text" class="form-control" id="usr" name="tensp" required value="{{ $sp->name }}">
                                        </td>
                                        <td>
                                            <span>Chọn loại sản phẩm: </span>
                                            <br>
                                            <select name="id_loai" style="border-radius: 3px;padding:6px;border:1px solid #DDD;width: 400px">
                                                @foreach($loaisp as $loai)
                                                <option value="{{ $loai->id }}" @if($sp->id_loai_sp==$loai->id) selected="selected" @endif> {{ $loai->tenloai }}</option>} @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>Đơn giá: </span>
                                            <input type="text" class="form-control" id="" name="dongia" value="{{ $sp->unit_price }}" required>

                                        </td>
                                        <td>
                                            <span>Chọn nhà cung cấp: </span>
                                            <br>
                                            <select name="ncc" style="border-radius: 3px;padding:6px;border:1px solid #DDD;width: 400px">
                                                @foreach($nhacungcap as $ncc)
                                                <option value="{{ $ncc->id }}" @if($sp->id_ncc==$ncc->id_ncc) selected="selected" @endif>{{ $ncc->ten_ncc }}</option>} @endforeach
                                            </select>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>Giá khuyến mại: </span>
                                            <input type="text" class="form-control" id="" name="giakm" value="{{ $sp->gia_km }}">
                                        </td>
                                        <td rowspan="3">
                                            <span>Ảnh sản phẩm:</span>
                                         {{--   <input type="file" name="txtfile"> --}}
                                           <input type='file' onchange='openFile(event)' class="hidden" id="ImgProd" name="txtfile">
                                            <br>
                                            <img id="output" class="thumbnail" width="150px" src="upload/sanpham/{{ $sp->image }}" name="" required style="width: 200px;height: 150px;">
                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <span>Đơn vị tính: </span>
                                            <input type="text" class="form-control" id="" name="don_vi_tinh" required value="{{ $sp->don_vi_tinh }}">
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <span>Trạng thái </span>
                                            <br>
                                            <div class="row">

                                                <label style="margin-left: 10px">Mới</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" name="new" value="1" @if($sp->new==1) checked @endif>

                                                <label style="margin-left: 15px">Cũ</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" name="new" value="0" @if($sp->new==0) checked @endif>

                                            </div>
                                        </td>
                                    </tr>
                                </table>

                            </div>
                            <br>
                            <div class="row">
                                <span>Mô tả sản phẩm:</span>
                                <textarea name="mota" id="mo_ta" class="ckeditor">{{ $sp->mota_sp }}</textarea>
                                <script type="text/javascript">
                                    var editor = CKEDITOR.replace('mota', {
                                        language: 'vi',
                                        filebrowserFileBrowseUrl: 'source/ckfinder/ckfinder.html?type=Files',
                                        filebrowserImageBrowseUrl: 'source/ckfinder/ckfinder.html?type=Images',
                                        filebrowserFlashBrowseUrl: 'source/ckfinder/ckfinder.html?type=Flash',
                                        filebrowserFileUploadUrl: 'source/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                        filebrowserImageUploadUrl: 'source/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                        filebrowserFlashUploadUrl: 'source/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                    });
                                </script>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <button type="submit" class="btn btn-info" name="cmd"><i class="fas fa-download"></i>&nbsp;&nbsp;&nbsp;&nbsp;Save</button>
                            </div>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="footer text-muted">
        &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
    </div>
    @include('script')
    <!-- /footer -->
    {{--
    <script type="text/javascript">
        function show() {
            document.getElementById("show").style.display = "block";
        }
    </script> --}}
</div>
@endsection()