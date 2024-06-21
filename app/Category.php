<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use Notifiable;
    protected $table = 'categories';
    protected $primaryKey = 'cate_id';
    protected $guarded = [];
    protected $rememberTokenName = false;


    public $incrementing = false;

    public function getAuthPassword(){
        return $this->password_hash;
    }
    public static function getDataCategory(){
        $query = DB::table('categories')->select('cate_id','category_name','description','created_at','updated_at')
            ->first();
        return $query;
    }
    public static function getListCategory($perPage, $keyword = null){
        $query = DB::table('categories');
        if ($keyword){
        $query = $query->where('category_name', 'LIKE' ,'%'.$keyword.'%');
}
        $data = $query->orderBy('cate_id', 'DESC')->paginate($perPage);
        return $data;

    }
    public static function insertCategory($data = []){
        $insert = db::table('categories')->insertGetId($data);
        return $insert;
    }
    public static function updateCategory($data =[], $id){
        $update = db::table('categories')
            ->where('cate_id', '=', $id)
            ->update($data);
        return true;
    }
}
