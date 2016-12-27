// initialize with defaults
$("#input-id").fileinput();

var url = $("#url").val();
// with plugin options
$("#input-id").fileinput({
    uploadUrl : url,
    showUpload : false,
    showRemove : true,
    language : 'zh',
    allowedPreviewTypes: ['image'],
    allowedFileTypes: ['image'],
    allowedFileExtensions:  ['jpg', 'png', 'jpeg'],
    maxFileSize : 2000,
    maxFileCount: 100,
    browseClass: "btn btn-primary", //按钮样式
    previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
}).on("fileuploaded", function (data) {
        var res = data.response;
        if (res.status > 0) {
            alert('上传成功');
            alert(res.code);
        }
        else {
            alert('上传失败');
        }
    });