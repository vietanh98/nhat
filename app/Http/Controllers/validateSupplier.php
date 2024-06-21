<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

class validateSupplier
{

    public static function validate($request)
    {
        $rule = [
            'name' => 'required',
            'address'=>'required',
            'phone' => 'required|numeric|min:10',
            'email' =>'required|email',
        ];
        $messages = [
            'name.required' => 'Bạn chưa nhập nhập tên nhà cung cấp',
            'address.required' => 'Bạn chưa nhập địa chỉ nhà cung cấp',
            'phone.required' => 'Bạn chưa nhập số điện hoại',
            'email.required' => 'Bạn chưa nhập email',
            'phone.numeric' => 'Định dạng số điện thoại không đúng',
            'phone.min' =>'Định dạng số điện thoại không đúng',
            'quantity.numeric' => 'Chỉ được nhập số',
            'description.required' => 'Bạn chưa nhập môt tả sản phẩm',
            'brand.required'=>'Bạn chưa nhập thương hiệu sản phẩm'
        ];


        $validator = Validator::make($request->all(), $rule, $messages);
        return $validator;
    }
}
