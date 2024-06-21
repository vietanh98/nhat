<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|',
            'confirm_password'=>'required|same:password',
            'password' => 'required|confirmed|min:6',
            'user_name' => 'required|min:2',
            'address'=>'required',
            'telephone' =>'required|number|min:10|max:10',
            'date'=>'required|date',
        ];
    }
    public function messages()
    {
        return[

            'email.required' => 'Bạn chưa nhập email',
            'confirm_password.required' => 'Bạn chưa nhập lại mật khẩu',
            'confirm_password.same' => 'Nhập lại mật khẩu không đúng',
            'user_name.required' => 'Bạn chưa nhập user Name',
            'address.required' => 'Bạn chưa nhập địa chỉ',
            'telephone.required' => 'Bạn chưa nhập số điện thoại',
            'date.required' => 'Bạn chưa nhập ngày',

            'password.min' => 'Email nhập vào phải dài hơn 6 ký tự',
            'user_name.min' => 'User Name nhập vào phải dài hơn 2 ký tự',
            'telephone.number' => 'Bạn phải nhập đúng số điện thoại',
            'telephone.min' =>'Bạn phải nhập đúng số điện thoại',
            'telephone.max' => 'Bạn phải nhập đúng số điện thoại',
            'email.email' => 'Email bạn nhập không đúng định dạng',
            'password.required'=>'Bạn chưa nhập Password'
        ];
    }
}
