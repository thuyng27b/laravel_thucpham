@extends('admin') @section('content1')
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">THỰC PHẨM SẠCH</span></h4>
        </div>
      {{--  @include('error_message') --}}
        @if(count($errors)>0)
                <div class="alert alert-danger" style="width: 300px">
                    @foreach($errors->all() as $err)
                    {{ $err }}
                    @endforeach
                </div>
                @endif
                 @if(Session::has('thanh cong'))
                <div class="alert alert-success" style="width: 300px">
                    {{ Session::get('thanh cong') }}
                </div>
                @endif()
                <br>
        <div class="heading-elements">
            <div class="heading-btn-group">
                 <div class="row">
                   <div class="col-md-3">
                    <form action="{{ route('import1') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="file" class="form-control" name="import_file" >
                   </div>
                   <div class="col-md-2">
                     <input type="submit" name="" value="Import" placeholder="" class="btn btn-primary">
                   </div>
                     </form>
                   <div class="col-md-3">
                        <a href="{{ route('export1') }}" title="" class="btn btn-success"><i class="fas fa-file-export"></i>&nbsp;Export to XLS</a>
                   </div>
                   <div class="col-md-2">
                          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i>&nbsp; &nbsp;&nbsp;&nbsp;Thêm mới</button>
                   </div>
               </div>
                
                <!-- Modal -->
            </div>
        </div>
        {{-- modal add --}}
       @include('admin_page.tbl_loaisp.them_sp')
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
                    <th>Tên loại phẩm</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @php
                $stt=0;
                if(isset($_GET['page'])){
                    $a=$_GET['page'];}
                else
                {  $a=1; }
                $stt=($a-1)*10;
                @endphp
                @foreach($loai_sp as $loai)
                 @php $stt++;@endphp
                    <tr>
                        <td>{{ $stt }}</td>
                        <td>{{ $loai->tenloai }}</td>
                        <td>
                            <a href="sua/{{$loai->id }}" title=""><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sua/{{ $loai->id }}">Sửa</button></a>  
                        </td>
                        @if($loai->Delet==2)
                        <td><button type="button" class="btn"  onclick="xoa()">Xóa</button></td>
                        @else
                        <td>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal2{{ $loai->id }}" onclick="xoa()">Xóa</button>
                            <div id="myModal2{{ $loai->id }}" class="modal fade" role="dialog">
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
                                           <a href="{{ route('xoa-loai',$loai->id) }}" title=""><button type="button" class="btn btn-info btn-lg"><i class="fas fa-plus"></i>&nbsp; &nbsp;&nbsp;&nbsp;Có</button></a>
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </td>
                        @endif
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