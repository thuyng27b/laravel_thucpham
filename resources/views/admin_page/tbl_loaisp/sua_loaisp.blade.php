@extends('admin') @section('content1')
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">THỰC PHẨM SẠCH</span></h4>
        </div>
       @include('error_message')
        <div class="heading-elements">
            <div class="heading-btn-group">
                
            </div>
        </div>
        {{-- modal add --}}
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
        {{-- end modal add --}}

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
    <div class="panel panel-flat" style="width: 600px;margin:auto;">
        <form action="" method="post" accept-charset="utf-8">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table class="table datatable-autofill-basic" id="" style="text-align: center;">
            <thead>
                <tr>
                    <td colspan="2" id="nen">Sửa loại sản phẩm</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tên loại</td>
                    <td><input type="text" class="form-control" id="" name="tenloai1"  value="{{ $data->tenloai }}"></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" class="btn btn-info" name=""><i class="fas fa-download"></i>&nbsp;&nbsp;&nbsp;&nbsp;Save</button></td>

                </tr>
            </tbody>
        </table>
         </form>
        </div>
        <div class="footer text-muted">
            &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
        </div>
        <!-- /footer -->
        </div>
        @endsection()