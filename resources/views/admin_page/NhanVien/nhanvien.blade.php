@extends('admin') @section('content1')
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">THỰC PHẨM SẠCH</span></h4>
        </div>
        @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                    {{ $err }}
                    @endforeach
                </div>
        @endif
         @if(Session::has('flag'))
                <div class="alert alert-{{ Session::get('flag') }}">
                    {{ Session::get('tb') }}
                </div>
                @endif
        <div class="heading-elements">
            <div class="heading-btn-group">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i>&nbsp; &nbsp;&nbsp;&nbsp;Thêm mới</button>
                <!-- Modal -->
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
                        <form action="" method="post" accept-charset="utf-8">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <span>Tên loại sản phẩm: </span>
                            <input type="text" class="form-control" id="usr" name="tennv" required>
                            <div class="modal-footer" style="margin-top:20px">
                                <button type="submit" class="btn btn-info" name="cmd"><i class="fas fa-download"></i>&nbsp;&nbsp;&nbsp;&nbsp;Save</button>
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
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Danh sách loại sản phẩm</h5>
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
          &nbsp; &nbsp;Tìm kiếm: &nbsp;<input type="text" id="ip_seach" name="key" value="" placeholder="  Seach... " class="animated inifinite bounceInDown" onkeyup="myFunction()" style="border:1px solid #AAA;margin-bottom: 15px;padding:5px"><br>
        <table class="table datatable-autofill-basic" id="tb_admin">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên nhân viên</th>
                    <th>Giới tính</th>
                    <th>Ngày sinh</th>
                    <th>Quê quán</th>
                    <th>Số điện thoại</th>
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
                $stt=($a-1)*10;
                @endphp
                @foreach($nhanvien as $nv)
                 @php $stt++;@endphp
                    <tr>
                        <td>{{ $stt }}</td>
                        <td>{{ $nv->ten_nhanvien }}</td>
                        <td>{{ $nv->gioitinh }}</td>
                        <td>{{ $nv->ngaysinh }}</td>
                        <td>{{ $nv->quequan }}</td>
                        <td>{{ $nv->sdt }}</td>
                        <td>
                            <a href="sua/{{$nv->id }}" title=""><button type="button" class="btn btn-primary">Sửa</button></a>  
                        </td>
                        <td>
                           
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal2{{ $nv->id }}" onclick="xoa()">Xóa</button>
                            <div id="myModal2{{ $nv->id }}" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Bạn có muỗn xóa sản phẩm</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Some text in the modal.</p>
                                        </div>
                                        <div class="modal-footer">
                                           <a href="" title=""><button type="button" class="btn btn-info btn-lg"><i class="fas fa-plus"></i>&nbsp; &nbsp;&nbsp;&nbsp;Có</button></a>
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
        <!-- /footer -->
        </div>
         <script>
                    function myFunction() {
                      var input, filter, table, tr, td, i;
                      input = document.getElementById("ip_seach");
                      filter = input.value.toUpperCase();
                      table = document.getElementById("tb_admin");
                      tr = table.getElementsByTagName("tr");
                      for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[1];
                        td1 = tr[i].getElementsByTagName("td")[2];
                    
                        if (td||td1) {
                          if (td.innerHTML.toUpperCase().indexOf(filter)>-1||td1.innerHTML.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                          } else {
                            tr[i].style.display = "none";
                          }
                        }       
                      }
                    }
                    </script>
        @endsection()