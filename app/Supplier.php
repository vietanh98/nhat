<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Supplier extends Model
{
    use Notifiable;
    protected $table = 'suppliers';
    protected $primaryKey = 'supplier_id';
    protected $guarded = [];
    protected $rememberTokenName = false;


    public $incrementing = false;


    public static function getListSupplier($perPage, $keyword = null){
        $query = DB::table('suppliers');
        if ($keyword){
            $query = $query->where('supplier_name', 'LIKE' ,'%'.$keyword.'%');
        }
        $data = $query->orderBy('supplier_id', 'DESC')->paginate($perPage);
        return $data;

    }
    public static function insertSupplier($data = []){
        $insert = db::table('suppliers')->insertGetId($data);
        return $insert;
    }
    public static function updateSupplier($data =[], $id){
        $update = db::table('suppliers')
            ->where('supplier_id', '=', $id)
            ->update($data);
        return true;
    }
}
