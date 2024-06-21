<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

class validateCategory
{

    public static function validate($request)
    {
        $rule = [
            'cate_name' => 'required|min:3',
            'description'=>'required|min:6',

        ];
        $messages = [
            'cate_name.required' => 'Bạn chưa nhập tên danh mục',
            'description.required' => 'Bạn chưa nhập mô tả',
            'cate_name.min'=>"Tên danh mục phải nhiều hơn 3 ký tự",
            'description.min'=>"Mô tả phải nhiều hơn 6 ký tự",
        ];

        $validator = Validator::make($request->all(), $rule, $messages);
        return $validator;
    }
}
