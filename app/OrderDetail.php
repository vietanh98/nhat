<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class OrderDetail extends Model
{
    use Notifiable;
    protected $table = 'order_detail';
    protected $primaryKey = 'odetail_id';
    protected $guarded = [];
    protected $rememberTokenName = false;


    public $incrementing = false;

    public function orderproduct(){
        return $this->belongsTo('App\Order');

    }
}
