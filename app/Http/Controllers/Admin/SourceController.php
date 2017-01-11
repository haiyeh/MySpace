<?php

namespace App\Http\Controllers\Admin;

use App\model\Source;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SourceController extends Controller
{

    public function index()
    {
        $sources = Source::getPageSources();

        return view('admin.source', ['title' => '资源管理列表', 'sources' => $sources]);
    }

    public function sourceDelete(Request $request)
    {
        $id = $request->id;
        $res = Source::delSource($id);

        if ($res){
            return 1;
        }else{
            return 0;
        }
    }

    public function storeSource(Request $request)
    {
        $source_name = $request->name;
        $source_link = $request->link;
        $status = $request->status;

        $id = session('source_id');
        if (isset($id)){
            $res = Source::where('id', $id)->update(['source_name' => $source_name, 'source_link' => $source_link, 'status' => $status]);
        }else{
            $res = Source::storeSource($source_name, $source_link, $status);
        }

        if ($res){
            return 1;
        }else{
            return 0;
        }
    }

    public function getSourceEdit(Request $request)
    {
        $id = $request->id;
        $request->session()->put('source_id', $id);
        $source = Source::getSourceMsg($id);

        return view('admin.addSource', ['source' => $source]);
    }
}
