<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use Notifiable;
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $guarded = [];
    protected $rememberTokenName = false;


    public $incrementing = false;


    public static function getListProduct($perPage, $keyword = null){
        $query = DB::table('products');
        if ($keyword){
            $query = $query->where('product_name', 'LIKE' ,'%'.$keyword.'%');
        }
        $data = $query->orderBy('product_id', 'DESC')->paginate($perPage);
        return $data;

    }
    public static function insertProduct($data = []){
        $insert = db::table('products')->insertGetId($data);
        return $insert;
    }
    public static function updateProduct($data =[], $id){
        $update = db::table('products')
            ->where('product_id', '=', $id)
            ->update($data);
        return true;
    }
    public static function getProductByCategory($keyword=null){
        $categories = db::table('categories')
            ->select('cate_id', 'category_name')
            ->orderBy('cate_id', 'DESC')
            ->get();
        foreach ($categories as $item) {
            $products = db::table('products')
                        ->select('products.product_id','products.product_name', 'products.product_discount', 'products.product_image', 'products.product_price', 'products.product_description')
                        ->where('products.category_id', '=', $item->cate_id)
                        ->limit(8)
                        ->get();
            $item->products = $products;
        }
        return $categories;
    }

    public static function ProductByCategory($cate_id,$perPage,$keyword =null){
            $query = db::table('products')
                ->select('product_id','product_name', 'product_image', 'product_price', 'product_description','product_discount')
                ->where('category_id', '=', $cate_id);
            if ($keyword){
                $data = $query
                    ->where('product_name', 'LIKE' ,'%'.$keyword.'%');
            }
        $products = $query->orderBy('product_id', 'DESC')->paginate($perPage);
        return $products;
    }
    public static function showCheapProduct($perPage, $keyword = null){
        $query = DB::table('products')
            ->where('product_price', '<=',200000);
        if ($keyword){
            $query = $query->where('product_name', 'LIKE' ,'%'.$keyword.'%');
        }
        $data = $query->orderBy('product_id', 'DESC')->paginate($perPage);
        return $data;
    }
    public static  function sellingProduct() {
        $query = DB::table('products')
             ->join('order_detail', 'order_detail.product_id', '=', 'products.product_id')
            ->select('products.product_id','products.product_name', 'products.product_image', 'products.product_price', 'products.product_description')
            ->where('');
    }
    public static function productNew(){
        $date = Carbon::yesterday();
        $query = DB::table('products')
            ->select('product_id', 'product_name','product_image', 'product_price', 'product_description')
            ->where('created_at','>=',$date);
        $product = $query->orderBy('created_at', 'desc')
            ->limit('5')
            ->get();
        return $product;
    }
}
