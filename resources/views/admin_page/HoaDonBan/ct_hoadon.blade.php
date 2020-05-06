@extends('admin') @section('content1')
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <hdan class="text-semibold">THỰC PHẨM SẠCH</hdan></h4>
        </div>

        <div class="heading-elements">
            <div class="heading-btn-group">
               <a href="{{ route('ds-hd-ban')  }}" class="btn btn-info"><i class="fas fa-backward"></i>&nbsp;Quay lại</a>
                <!-- Modal -->
            </div>
        </div>
        <div id="myModal" class="modal fade" role="dialog">
            <form action="" method="get" accept-charset="utf-8">
                <div class="modal-dialog" style="width: 800px;">
                    <!-- Modal content-->
                    <div class="modal-content" style="padding:20px">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Thêm sản phẩm</h4>
                            <hr>
                        </div>
                     
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fas fa-download"></i>&nbhd;&nbhd;&nbhd;&nbhd;Save</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <div id="myModal1" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Sửa sản phẩm</h4>
                    </div>
                    <div class="modal-body">
                        <p>Some text in the modal.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fas fa-pencil-alt"></i>&nbhd;&nbhd;&nbhd;&nbhd;Save</button>
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
         &nbsp; &nbsp;Tìm kiếm: &nbsp;<input type="text" id="ip_seach" name="key" value="" placeholder="  Seach... " class="animated inifinite bounceInDown" onkeyup="myFunction()" style="border:1px solid #AAA;margin-bottom: 15px;padding:5px"><br>
        <table class="table datatable-autofill-basic" id="tb_admin">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                   {{--  <th>Đơn vị</th> --}}
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
                @foreach($ct_hd as $hd)
                 @php $stt++;@endphp
                    <tr>
                        <td>{{$stt }}</td> 
                         @foreach($sanpham as $sp) @if($hd->id_sp==$sp->id)
                        <td>{{ $sp->name }}</td>
                        <td><img src="source/img/img_sp/{{ $sp->image }}"></td>
                        <td style="color:red">{{ number_format($sp->unit_price,0,'','.') }}</td>  
                        <td>{{ $hd->sl }}</td>  
                        <td style="color:red">{{ number_format($sp->unit_price*$hd->sl,0,'','.' )}}</td>
                        @endif @endforeach  
                        {{-- <td>{{ $hd->don_vi }}</td>  --}}       
                    </tr>
                   @endforeach
            </tbody>
        </table>
    </div>
    <div class="footer text-muted">
        &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
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
                        td4 = tr[i].getElementsByTagName("td")[5];
                        td5 = tr[i].getElementsByTagName("td")[6];
                        td6 = tr[i].getElementsByTagName("td")[7];
                        if (td||td1||td2||td3||td4||td5||td6) {
                          if (td.innerHTML.toUpperCase().indexOf(filter)>-1||td1.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1 ||td3.innerHTML.toUpperCase().indexOf(filter) > -1||td4.innerHTML.toUpperCase().indexOf(filter) > -1 ||td5.innerHTML.toUpperCase().indexOf(filter) > -1 ||td6.innerHTML.toUpperCase().indexOf(filter) > -1 ) {
                            tr[i].style.dihdlay = "";
                          } else {
                            tr[i].style.dihdlay = "none";
                          }
                        }       
                      }
                    }
                    </script>
</div>
@endsection()