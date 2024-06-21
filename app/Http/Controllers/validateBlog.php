<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

class validateBlog
{

    public static function validate($request)
    {
        $rule = [
            'title' => 'required',
            'editor'=>'required',
        ];
        $messages = [
            'title.required' => 'Bạn chưa nhập tiêu đề Bài viết',
            'editor.required' => 'Bạn chưa nhập nội dung bài viết',

        ];


        $validator = Validator::make($request->all(), $rule, $messages);
        return $validator;
    }
}
