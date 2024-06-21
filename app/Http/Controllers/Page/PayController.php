<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PayController extends Controller
{
    public function pay(){
        return view('PageSale.pay');
    }
    public function paySuccess(){
        return view('page.paySucsses');
    }
}
