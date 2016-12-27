// initialize with defaults
$("#input-id").fileinput();

var url = $("#url").val();
// with plugin options
$("#input-id").fileinput({
    uploadUrl : url,
    showUpload : false,
    showRemove : true,
    language : 'zh',
    uploadAsync:false,
    dropZoneEnabled:false,
    resizeImage: false,
    allowedFileTypes: ['image'],
    allowedFileExtensions:  ['jpg', 'png', 'jpeg'],
    maxFileSize : 2000,
    maxFileCount: 100,
    browseClass: "btn btn-primary", //按钮样式
    previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
}).on("fileuploaded", function () {
            layui.use('layer', function () {
                var layer = layui.layer;
                layer.msg('上传成功');
            })
        }
    );