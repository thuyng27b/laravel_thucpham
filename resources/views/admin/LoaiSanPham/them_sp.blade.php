<div id="Create" class="modal fade" role="dialog">
     <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Sua thong tin he thong</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('loaisp.postLoai') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data" name ="frm" id="frm">
                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                    {{ csrf_token() }}
                    <lable>Tên loại sản phẩm: </lable>
                    <input type="text" class="form-control" id="usr" name="ten_loai" required>
                    <input type="hidden" name="loaidang" id="loaidang" value="">
                    <input type="hidden" name="id" id="id" value="">
                    <div class="modal-footer" style="margin-top:20px">
                        <button type="submit" class="btn btn-info" name="" id="add"><i class="fas fa-download"></i>&nbsp;&nbsp;&nbsp;&nbsp;Save</button>    
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                        </div>
                         </form>
                    </div>

                </div>

            </div>