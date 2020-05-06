@extends('admin') @section('content1')
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">THỰC PHẨM SẠCH</span></h4>
        </div>
         @include('error_message')
        <div class="heading-elements">
            <div class="heading-btn-group">
               <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i>&nbsp; &nbsp;&nbsp;&nbsp;Thêm mới</button>
            </div>
        </div>
        {{-- modal add --}}
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <form action="" method="post" accept-charset="utf-8">
                    <form action="" method="post" accept-charset="utf-8">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Thêm nhà cung cấp</h4>
                            </div>
                             <form action="{{ route('ds-ncc') }}" method="post" accept-charset="utf-8">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="modal-body">
                                <span>Tên nhà cung cấp: </span>
                                <input type="text" class="form-control" id="" name="name" required>
                                <br>
                                <span>Địa chỉ: </span>
                                <input type="text" class="form-control" id="" name="address" required>
                                <br>
                                <span>Email: </span>
                                <input type="text" class="form-control" id="" name="email" required>
                                <br>
                                <span>Số điện thoại: </span>
                                <input type="text" class="form-control" id="" name="phone" required>
                                <br>
                            </div>
                            <div class="modal-footer">
                                 <button type="submit" class="btn btn-info" name="cmd"><i class="fas fa-download"></i>&nbsp;&nbsp;&nbsp;&nbsp;Save</button>
                            </form>
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                            </div>
                        
                        </div>
                    </form>
            </div>
        </div>
        {{-- end modal add --}} {{-- modal update --}}
      
        {{-- end modal update --}}
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
            <h5 class="panel-title">Danh sách các nhà cung cấp</h5>
        </div>
          &nbsp; &nbsp;Tìm kiếm: &nbsp;<input type="text" id="ip_seach" name="key" value="" placeholder="  Seach... " class="animated inifinite bounceInDown" onkeyup="myFunction()" style="border:1px solid #AAA;margin-bottom: 15px;padding:5px"><br>
        <table class="table datatable-autofill-basic" id="tb_admin">
            <thead style="">
                <tr>
                    <th>STT</th>
                    <th>Tên nhà cung cấp</th>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php $stt=0; foreach($nhacungcap as $ncc):$stt++?>
                    <tr>
                        <td>{{ $stt }}</td>
                        <td>{{ $ncc->ten_ncc }}</td>
                        <td>{{ $ncc->diachi_ncc }}</td>
                        <td>{{ $ncc->email }}</td>
                        <td>{{ $ncc->sdt }}</td>
                        <td>
                            <a href="{{ route('sua-nha-cung-cap',$ncc->id) }}" title="">
                            <button type="button" class="btn btn-primary" id="btn1">Sửa</button></a>
                        </td>
                         @if($ncc->Delet==2)
                        <td><button type="button" class="btn"  onclick="xoa()">Xóa</button></td>
                        @else
                          <td>  
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal2{{ $ncc->id }}" onclick="xoa()">Xóa</button>
                            <div id="myModal2{{ $ncc->id }}" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Bạn có muỗn xóa</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Some text in the modal.</p>
                                        </div>
                                        <div class="modal-footer">
                                           <a href="{{ route('xoa-ncc',$ncc->id) }}" title=""><button type="button" class="btn btn-info btn-lg"><i class="fas fa-plus"></i>&nbsp; &nbsp;&nbsp;&nbsp;Có</button></a>
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </td>
                        @endif
                    </tr>
                    <?php endforeach ?>
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
                        td2 = tr[i].getElementsByTagName("td")[3];
                        td3 = tr[i].getElementsByTagName("td")[4];
                        if (td||td1||td2||td3) {
                          if (td.innerHTML.toUpperCase().indexOf(filter)>-1||td1.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1 ||td3.innerHTML.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                          } else {
                            tr[i].style.display = "none";
                          }
                        }       
                      }
                    }
                    </script>

@endsection()