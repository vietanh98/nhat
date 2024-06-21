<?php

namespace App\Http\Controllers\Page;

use App\Blog;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\validateUser;
use App\PageSale;
use App\User;
use App\UserProfile;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class PageSaleController extends Controller
{
    public function showProduct(Request $request)
    {
        $keyword = $request->keyword;
        $dataProduct = Product::getProductByCategory();
        if ($keyword){
            $dataProduct ->where('product_name', 'LIKE' ,'%'.$keyword.'%');
        }
        return view('PageSale.index', ['dataProduct' => $dataProduct]);
    }
    public function createCustomer(Request $request)
    {
        try {
            $validator = validateUser::validate($request);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->messages(),
                ], 200);
            } else {

                $userName = $request->input('name');
                $email = $request->input('email');
                $phone = $request->input('phone');
                $dateOfBirth = $request->input('date_of_birth');
                $address = $request->input('address');
                $role = $request->input('role');
                $avatar = $request->input('img');
                if ($role == '') {
                    $role_id = UserProfile::khachhang;
                } else {
                    $role_id = $role;
                }
                $password = $request->input('password');
                $date = date('Y-m-d', strtotime($dateOfBirth));
                $data = [
                    'user_name' => $userName,
                    'email' => $email,
                    'phone' => $phone,
                    'address' => $address,
                    'date_of_birth' => $date,
                    'avatar' => $avatar,
                    'password' => bcrypt($password),
                    'role_id' => $role_id
                ];
                if (User::where('email', '=', $email)->exists()) {
                    return response()->json([
                        'success' => false,
                        'error_email' => 'Email đã tồn tại vui lòng nhập email khác',
                    ], 200);
                } else {
                    $createUser = PageSale::insertCustomer($data);
                    if (isset($createUser)) {
                        return response()->json([
                            'success' => true,
                            'message' => 'Thêm user thành công',
                        ], 200);
                    } else {
                        return response()->json([
                            'success' => false,
                            'error' => 'Thêm user thất bại',
                        ], 200);
                    }
                }

            }
        } catch (\Exception $e) {
            Log::info('Start postLogin');
            Log::error($e->getMessage());
            return response()->json([
                'success' => true,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
    public function showContact(){
        $dataProduct = Product::getProductByCategory();
        return view('PageSale.contact', ['dataProduct' => $dataProduct]);
    }
    public function showDetailProduct(Request $request){
        $id= $request->product_id;
        $getData = PageSale::getDataProduct($id);
        $dataProduct = Product::getProductByCategory();
        return view('PageSale.showDetailProduct', ['dataProduct' => $dataProduct, 'getData' => $getData]);
    }
    public function showBlog(){
        $dataProduct = Product::getProductByCategory();
        $dataBlog = Blog::all();
        return view('PageSale.showBlog', ['dataProduct' => $dataProduct, 'dataBlog' => $dataBlog]);
    }
    public function showProductCategory(Request $request){
        $keyword = $request->keyword;
        $cate_id = $request->cate_id;
        $dataProduct = Product::getProductByCategory();
        $getProduct = Product::ProductByCategory($cate_id, UserProfile::display_product, $keyword);
        $newProduct = Product::productNew();
        $links = $getProduct->appends(['perPage'=>UserProfile::display_product]);
        return view('PageSale.showProduct', ['dataProduct' => $dataProduct, 'getProduct' => $getProduct, 'newProduct' => $newProduct, 'links'=>$links]);
    }
    public function showCheapProduct(Request $request){
        try {
            $keyword = $request->keyword;
            $getProduct = Product::showCheapProduct(UserProfile::display_product, $keyword);
            $dataProduct = Product::getProductByCategory();
            $newProduct = Product::productNew();
            $links = $getProduct->appends(['perPage'=>UserProfile::display_product]);
            return view('PageSale.PriceMin', ['dataProduct'=>$dataProduct, 'links'=>$links, 'getProduct' => $getProduct, 'newProduct' => $newProduct]);
        }
        catch (\Exception $e) {
            Log::info('Start postLogin');
            Log::error($e->getMessage());
            return response()->json([
                'success' => true,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
    public function showGetNewProduct(){
        $newProduct = Product::productNew();
        return view('page.newProduct', ['newProduct' => $newProduct]);
    }
}
