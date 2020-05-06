 <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thêm loại sản phẩm</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('ds-loai-sp') }}" method="post" accept-charset="utf-8">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <span>Tên loại sản phẩm: </span>
                            <input type="text" class="form-control" id="usr" name="ten_loai" required>
                            <div class="modal-footer" style="margin-top:20px">
                                <button type="submit" class="btn btn-info" name="cmd"><i class="fas fa-download"></i>&nbsp;&nbsp;&nbsp;&nbsp;Save</button>
                        </form>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>

            </div>