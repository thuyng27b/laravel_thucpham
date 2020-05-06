function CKEDITOR (name){
	language:'vi',
	var editor=CKEDITOR.replace( 'name', {
        filebrowserBrowseUrl:baseURL+ 'source/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: baseURL+ 'source/ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl: baseURL+ 'source/ckfinder/ckfinder.html?type=Flash',
        filebrowserUploadUrl:baseURL+ 'source/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: baseURL+ 'source/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl:baseURL+ 'source/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    } );
}