<div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thêm sản phẩm</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('ds-loai-sp') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                            
                            @csrf
                            
                     <div class="row">
                                <div class="col-md-6">
                                    <span>Tên sản phẩm: </span>
                                    <input type="text" class="form-control" id="usr" name="tensp" required value="">
                                    <br>
                                    <span>Chọn loại sản phẩm: </span><br>
                                    <select name="id_loai" style="border-radius: 3px;padding:6px;border:1px solid #DDD;width: 470px">
                                        
                                        <option value="" selected="selected">
                                           </option>} 
                                    </select><br><br>
                                    <span>Chọn nhà cung cấp: </span><br>
                                    <select name="ncc" style="border-radius: 3px;padding:6px;border:1px solid #DDD;width: 470px">
                                       
                                    </select>
                                    <br>
                                    <br>
                                    <span>Đơn giá: </span>
                                    <input type="text" class="form-control" id="" name="dongia" value="" required>
                                    <br>
                                    <span>Giá khuyến mại: </span>
                                    <input type="text" class="form-control" id="" name="giakm" value="">
                                    <br>
                                    <span>Đơn vị tính: </span>
                                    <input type="text" class="form-control" id="" name="don_vi_tinh" required value="">
                                    <br>
                                    <span>Ghi chú: </span>
                                    <input type="text" class="form-control" id="" name="note" value="">
                                    <br>
                                </div>
                                <div class="col-md-offset-1 col-md-5">
                                    <span>Ảnh sản phẩm:</span>
                                     <input type='file' accept='image/*' onchange='openFile(event)' class="hidden" id="ImgProd" name="img"><br>
                                    <img id="output" class="thumbnail" width="150px" src="" name="" required style="width: 150px;height: 150px;">
                                    <br>
                                   <label class="hidden" name="img1"></label>
                                    <span>Trạng thái </span><br>
                                    <div class="row">
                                        <div class="col-md-3">
                                             <label>Mới</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="new" value="1" checked >
                                        </div>
                                        <div class="col-md-offset-1 col-md-3">
                                            <label>Cũ</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="new"  value="0" checked>
                                        </div>
                                    </div>                               
                                    <br>
                                </div>
                            </div>
                            <br>
                            <input type="hidden" name="loaidang" value="" id="loaidang">
                            <div class="row">
                                <span>Mô tả sản phẩm:</span>
                                <textarea name="mota" id="mo_ta" class="ckeditor"></textarea>
                                <script type="text/javascript">
                                var editor=CKEDITOR.replace( 'mota', {
                                    language:'vi',
                                    filebrowserFileBrowseUrl:'source/ckfinder/ckfinder.html?type=Files',
                                    filebrowserImageBrowseUrl: 'source/ckfinder/ckfinder.html?type=Images',
                                    filebrowserFlashBrowseUrl:  'source/ckfinder/ckfinder.html?type=Flash',
                                    filebrowserFileUploadUrl:'source/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                    filebrowserImageUploadUrl:'source/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                    filebrowserFlashUploadUrl: 'source/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                } );
                                </script>
                            </div><br><br>
                            <div class="row">
                                 <button type="submit" class="btn btn-info" name="cmd"><i class="fas fa-download"></i>&nbsp;&nbsp;&nbsp;&nbsp;Save</button>
                            </div>
                        



                        </div>
                    </div>

                </div>

            </div>