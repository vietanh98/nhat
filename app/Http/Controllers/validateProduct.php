<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

class validateProduct
{

    public static function validate($request)
    {
        $rule = [
            'product_code' => 'required',
            'name'=>'required',
            'supplier' => 'required',
            'price' => 'required|numeric',
            'quantity' =>'required|numeric',
            'id-category'=>'required',
            'status'=>'required',
            'brand' =>'required',
            'description'=>'required',
        ];
        $messages = [
            'product_code.required' => 'Bạn chưa nhập mã sản phẩm',
            'name.required' => 'Bạn chưa nhập tên sản phẩm',
            'supplier.required' => 'Bạn chưa chọn nhà cung cấp',
            'price.required' => 'Bạn chưa nhập giá sản phẩm',
            'quantity.required' => 'Bạn chưa nhập số lượng sản phẩm',
            'id-category.required' => 'Bạn chưa chọn danh mục sản phẩm',
            'status.required' => 'Bạn chưa nhập trạng thái sản phẩm',
            'price.numeric' => 'Chỉ được nhập số',
            'quantity.numeric' => 'Chỉ được nhập số',
            'description.required' => 'Bạn chưa nhập môt tả sản phẩm',
            'brand.required'=>'Bạn chưa nhập thương hiệu sản phẩm'
        ];



        $validator = Validator::make($request->all(), $rule, $messages);
        return $validator;
    }
}
