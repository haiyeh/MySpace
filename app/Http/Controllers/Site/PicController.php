<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;

use App\model\Album;
use App\model\Type;
use App\Http\Requests;
use Storage;
use Qiniu\Auth;
use App\model\Pic;
use Qiniu\Storage\UploadManager;
use App\Http\Controllers\Controller;


class PicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foldName = date("Y-m-d", time());
        $files = Storage::files($foldName);
//        var_dump($files);die;
        return view('site/picture', [
            'title' => 'picture',
            'files' => $files
        ]);
    }

    public function newAlbum()
    {
        return view('site/newAlbum', ['title' => '新建相册']);
    }

    public function storeAlbum(Request $request)
    {
        $name = $request->input('name');
        $desc = $request->input('desc');
        $status = $request->input('status');
        $type = Type::checkTypeExist($request->input('type'));
        if (!$type) {
            return 0;
        }
        if (empty($status)) {
            $status = 0;   //0表示不公开相册
        }
        $res = Album::storeAlbum($name,$type,$desc,$status);
        if ($res) {
            return 1;
        }else{
            return 0;
        }
    }

    public function uploadPic()
    {
        $albums = Album::getAlbums();
        if (empty($albums)){
            $albums = '暂无相册';
        }
        return view('site/uploadPic', ['title' => 'upload picture', 'albums' => $albums]);
    }

    public function uploadify(Request $request)
    {
        $album_id = $request->album_id;
        if ($request->hasFile('file')){
            $foldName = date("Y-m-d", time());
            if (!Storage::disk('local')->exists($foldName)){
                Storage::makeDirectory($foldName);
            }

            $file = $request->file('file');

            foreach ($file as $key => $value){
                $extension[] = $value->getClientOriginalExtension();
                $fileName[] = $value->getClientOriginalName();      //获得缓存的tmp文件名
                $filePath[] = $value->getRealPath();                //获得文件本地路径
            }
            for ($i = 0; $i<count($fileName); $i++){
                Storage::disk('local')->put($fileName[$i], $file);
                $store = Storage::move($fileName[$i], $foldName.'/'.md5($fileName[$i]).'.'.$extension[$i]);
                $imagePath = app_path().$foldName.'/'.md5($fileName[$i]).'.'.$extension[$i];
                $imagePath = str_replace("/", '\\', $imagePath);
                $upload_at = time();
                $res = Pic::addImgPath($imagePath, $album_id, $upload_at);
                if ($res == false){
                    return "保存失败";
                }
                if ($store == false){
                    return "上传失败";
                }
            }

            return "上传成功";

        }

    }
}
