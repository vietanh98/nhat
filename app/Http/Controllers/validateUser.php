<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

class validateUser
{

    public static function validate($request)
    {
        $rule = [
            'email' => 'required|email|',
            'confirmPassword'=>'required|same:password',
            'password' => 'required|min:6',
            'name' => 'required|min:2',
            'address'=>'required',
            'phone' =>'required|numeric',
            'date_of_birth'=>'required|date',
        ];
        $messages = [
            'email.required' => 'Bạn chưa nhập email',
            'confirmPassword.required' => 'Bạn chưa nhập lại mật khẩu',
            'confirmPassword.same' => 'Nhập lại mật khẩu không đúng',
            'name.required' => 'Bạn chưa nhập user Name',
            'address.required' => 'Bạn chưa nhập địa chỉ',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'date_of_birth.required' => 'Bạn chưa nhập ngày',

            'password.min' => 'Password nhập vào phải dài hơn 6 ký tự',
            'name.min' => 'User Name nhập vào phải dài hơn 2 ký tự',
            'phone.numeric' => 'Bạn phải nhập đúng số điện thoại',
//            'phone.max' => 'Bạn phải nhập đúng số điện thoại',
            'email.email' => 'Email bạn nhập không đúng định dạng',
            'password.required'=>'Bạn chưa nhập Password'
        ];

//        $rule['name'] = 'required|min:6';
//        $messages['name.required'] = 'vui lòng nhập user Name';
//        $messages['name.min'] = 'tên tài khoản phải nhiều hơn 6 ký tự';
//        $rule['email'] = 'required|email';
//        $messages['email.required'] = 'vui lòng nhập Email';
//        $messages['email.email'] = 'Email sai định dạng';
//        $rule['password'] = 'required|confirmed|min:6';
//        $mess
//            'user_name' => 'required|min:2',
//            'address'=>'required',
//            'telephone' =>'required|number|min:10|max:10',
//            'date'=>'required|date',



        $validator = Validator::make($request->all(), $rule, $messages);
        return $validator;
    }
}
