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
         <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thêm sản phẩm</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="" accept-charset="utf-8">
                            <span>Tên loại sản phẩm: </span>
                            <input type="text" class="form-control" id="usr" name="" required>
                            <div class="modal-footer" style="margin-top:20px">
                                <button type="" class="btn btn-info" name="cmd"><i class="fas fa-download"></i>&nbsp;&nbsp;&nbsp;&nbsp;Save</button>
                        </form>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        </div>
                    </div>

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
                        <form action="suancc/{{ $nhacungcap->id}}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <table id="tb_them">
                                    <tr>
                                        <td>
                                            <span>Tên nhà cung cấp: </span>
                                            <br>
                                            <input type="text" class="form-control" id="name" name="name" required value="{{ $nhacungcap->ten_ncc }}">
                                        </td>
                                        <td>
                                            <span>Địa chỉ nhà cung cấp: </span>
                                            <br>
                                            <input type="text" class="form-control" id="address" name="address" required value="{{ $nhacungcap->diachi_ncc }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>Email: </span>
                                            <input type="text" class="form-control" id="email" name="email" value="{{ $nhacungcap->email }}" required>

                                        </td>
                                        <td>
                                            <span>Số điện thoại: </span>
                                            <input type="text" class="form-control" id="" name="phone" value="{{ $nhacungcap->sdt }}" required>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <br>
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