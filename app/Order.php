<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use Notifiable;
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    protected $guarded = [];
    protected $rememberTokenName = false;


    public $incrementing = false;


    public static function getListOrder($perPage, $keyword = null){
        $query = DB::table('orders')
            ->join('order_detail', 'orders.order_id' , '=', 'order_detail.order_id')
            ->select('orders.order_id', 'orders.user_name', 'orders.phone', 'orders.address', 'orders.payment_methods', 'orders.note', 'orders.status',
                'order_detail.product_id', 'order_detail.odetail_unit_price', 'order_detail.odetail_quantity','order_detail.odetail_total_money', 'orders.created_at', 'orders.updated_at');
        if ($keyword){
            $query = $query->where('orders.user_name', 'LIKE' ,'%'.$keyword.'%');
        }
        $data = $query->orderBy('orders.order_id', 'DESC')->paginate($perPage);
        return $data;
    }
    public static function insertOrder($data = []){
        $insert = db::table('orders')->insertGetId($data);
        return $insert;
    }
    public static function updateOrder($data =[], $id){
        $update = db::table('order')
            ->where('order_id', '=', $id)
            ->update($data);
        return true;
    }
    public static function insertOrderdetail($dataOrderDetail = []){
        $insert = db::table('order_detail')
            ->insertGetId($dataOrderDetail);
        return insert;
    }
}
