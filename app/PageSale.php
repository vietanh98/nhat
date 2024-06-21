<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PageSale extends Model
{
    public static function insertCustomer($data = []){
        $insert = db::table('users')->insertGetId($data);
        return $insert;
    }
    public static function getDataProduct($id){
        $products = db::table('products')
            ->select('product_id','product_name', 'product_code', 'product_image', 'product_price','product_brand', 'product_description', 'product_status', 'product_discount')
            ->where('product_id', '=', $id)
            ->get();
        return $products;
    }
    public static function getProduct($cate_id)
    {
        $data =DB::table('products')
            ->select('product_name', 'product_image', 'product_price', 'product_description','category_id')
            ->where('category_id', '=', $cate_id)
            ->orderBy('created_at', 'DESC')
            ->get();
        return $data;
    }
}
