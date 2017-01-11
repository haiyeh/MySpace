<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    public static function getPubSources()
    {
        return Source::where('status', 1)->get();
    }

    public static function getAllSources()
    {
        return Source::orderby('id')->get();
    }

    public static function getPageSources()
    {
        return Source::orderby('id')->paginate(12);
    }

    public static function getSourceMsg($id)
    {
        return Source::where('id', $id)->first();
    }

    public static function storeSource($name, $link, $status)
    {
        $source = new Source();
        $source->source_name = $name;
        $source->source_link = $link;
        $source->status = $status;

        return $source->save();
    }

    public static function delSource($id)
    {
        return Source::destroy($id);
    }

    public static function checkSourceNameExists($name)
    {
        $res = Source::where('source_name', $name)->first();
        return $res->id;
    }
}
