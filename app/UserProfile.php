<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class UserProfile extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $hidden = [
        'password_hash',
    ];
    protected $rememberTokenName = false;

    const admin = 1;
    const nhanvien =2;
    const khachhang =3;
    const phantrang =5;
    const display_product = 12;

    public $incrementing = false;

    public function getAuthPassword(){
        return $this->password_hash;
    }
    public static function getEmail(){
        $query = DB::table('users')->select('email')
            ->first();
        return $query;
    }
    public static function createUser($data = []){
        $id = DB::table('users')
            ->insertGetId($data);
        return $id;
    }
    public static function updateUser($data = [], $user_id){
        $update = DB::table('users')
            ->where('id', '=', $user_id)
            ->Update($data);
        return true;
    }
    public static function getListUser($perPage, $keyword = null)
    {
        $query = DB::table('users');
        if ($keyword) {
            $query->where('user_name', 'LIKE', '%' . $keyword . '%');
//                  ->where('email', 'LIKE' ,'%'.$keyword. '%');
        }
        $data = $query->orderBy('created_at', 'DESC')->paginate($perPage);
        return $data;
    }
    public static function countUser(){
        $count = DB::table('users')->where('role_id', '=', '3')
            ->count();
        return $count;
    }
}

