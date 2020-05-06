@extends('admin') @section('content1')

<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i><span class="text-semibold">THỰC PHẨM SẠCH</span></h4>
        </div>
        @include('error_message')
        <div class="heading-elements">
            <div class="heading-btn-group">
                <div class="row">
                    <div class="col-md-3">
                        <form action="{{ route('import1') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="file" class="form-control" name="import_file">
                    </div>
                    <div class="col-md-2">
                        <input type="submit" name="" value="Import" placeholder="" class="btn btn-primary">
                    </div>
                    </form>
                    <div class="col-md-3">
                        <a href="{{ route('export1') }}" title="" class="btn btn-success"><i class="fas fa-file-export"></i>&nbsp;Export to XLS</a>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-info" id="showCreate"><i class="fas fa-plus"></i>&nbsp; &nbsp;&nbsp;&nbsp;Thêm loại</button>
                    </div>
                </div>

                <!-- Modal -->
            </div>
        </div>
        {{-- modal add --}} @include('admin.LoaiSanPham.them_sp')
    </div>
    {{-- end modal add --}}
</div>
</div>
<div class="content">
    <!-- Basic initialization -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Danh sách loại sản phẩm</h5>
            <div class="heading-elements">
            </div>
        </div>
        <br>
        <table class="table datatable-autofill-basic" id="dtCate">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên loại phẩm</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="footer text-muted">
        &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
    </div>
    <!-- /footer -->
</div>
{{-- @include('admin.LoaiSanPham.script') --}}
<script type="text/javascript">
    $(document).ready(function() {
        var url;
        var table = $('table#dtCate').dataTable();
        loaddata();
        //===========load data============
        function loaddata() {
            $('table#dtCate').dataTable().fnClearTable();
            url = "{{ route('loaisp.allLoai') }}";
            $.get(url, function(data) {
              console.log(data);
                var tt = 0;
                $.each(data, function(i, nd) {
                    tt++;
                    $('#dtCate').dataTable().fnAddData([
                        tt,
                        nd.tenloai,
                        '<button type="button" class="btn btn-info" onclick="editmuc(' + nd.id + ')">Sửa</button>',
                        '<button type="button" class="btn btn-danger" onclick="deletemuc(' + nd.id + ')">Xóa</button>'
                    ]);
                });
            });

        }
        //=============finish loaddata=======
        //==========create data=============
        $('#frm').submit(function(event) {
            event.preventDefault();
            url = "{{ route('loaisp.postLoai') }}";
            var dal = new FormData(this);
            $('#Create').modal('hide');
            $.ajax({
                url: url,
                method: "post",
                data: dal,
                contentType: false,
                processData: false,
                success: function(data1) {
                    $('#Create').modal('hide');
                    loaddata();
                }
            });
        });
        //=============finish create data=======
        //==========show create data==========
        $('showCreate').click(function() {
            $('.modal-title').html('Them san pham');
            $('#frm').trigger("reset");
            $('#loaidang').val("insert");
            $('#Create').modal("show");
        });
        //=============finish show create data=======
        $('#cmddelete').click(function() {
            var id = $('input[name=iddelete]').val();
            url = "{{ route('loaisp.deleteLoai') }}";
            $.get(url, {
                'id': id
            }, function(data) {
                loaddata();
            });
        });
    });
    //=========edit a news==========
    function editmuc(id) {
        $('.modal-title').html('Sua tai khoan moi');
        $('#loaidang').val("update");
        $('#id').val(id);
        //=============
        url = "{{ route('loaisp.OneLoai') }}";
        $.get(url, {
            'id': id
        }, function(data) {
            $("#name").val(data.tenloai);
        });
        //=============
        $("#Create").modal('show');
    }
    //======================Finish edit a news==========
    //=========Delete data===============
    function deletemuc(id) {
        var page = $('table#dtCate').DataTable().page.info();
        url = "{{ route('loaisp.OneLoai') }}";
        $get(url, {
            'id': id
        }, function(data) {
            $('#tieudexoa').html(data.tenloai);
            $('#iddelete').val(id);
        });
        $('#myModal').modal('show');
    }
</script>

@endsection()