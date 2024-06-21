<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    use Notifiable;
    protected $table = 'blogs';
    protected $primaryKey = 'blog_id';
    protected $guarded = [];
    protected $rememberTokenName = false;


    public $incrementing = false;


    public static function getListBlog($perPage, $keyword = null){
        $query = DB::table('blogs');
        if ($keyword){
            $query = $query->where('blog_title', 'LIKE' ,'%'.$keyword.'%');
        }
        $data = $query->orderBy('blog_id', 'DESC')->paginate($perPage);
        return $data;

    }
    public static function insertBlog($data = []){
        $insert = db::table('blogs')->insertGetId($data);
        return $insert;
    }
    public static function updateBlog($data =[], $id){
        $update = db::table('blogs')
            ->where('blog_id', '=', $id)
            ->update($data);
        return true;
    }
}
