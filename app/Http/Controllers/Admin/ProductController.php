<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\validateProduct;
use App\UserProfile;
use App\Product;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Stmt\DeclareDeclare;

class ProductController extends Controller
{
    public function showListProduct(Request $request)
    {
        try {
            $keyword = $request->keyword;
            $dataProduct = Product::getListProduct(UserProfile::phantrang, $keyword);
            $links = $dataProduct->appends(['perPage' => UserProfile::phantrang]);
            return view('Product.index', ['product' => $dataProduct, 'link'=>$links]);
        } catch (\Exception $e) {
            Log::info('Start postLogin');
            Log::error($e->getMessage());
            return response()->json([
                'success' => true,
                'message' => $e->getMessage(),
            ], 400);
        }

    }

    public function showCreateProduct()
    {
        $dataSupplier = Supplier::all();
        $dataCategory = Category::all();
        return view('Product.create', ['cate'=>$dataCategory, 'supplier'=>$dataSupplier]);
    }

    public function uploadFile(Request $request)
    {
        try {
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();
            /* Location */
            $location = public_path('image/') . $filename;
            $uploadOk = 1;
            $imageFileType = pathinfo($location, PATHINFO_EXTENSION);


            /* Valid Extensions */
                $valid_extensions = array("jpg", "jpeg", "png");
                /* Check file extension */
                if (!in_array(strtolower($imageFileType), $valid_extensions)) {
                    $uploadOk = 0;
                }

                if ($uploadOk == 0) {
                    return response()->json([
                        'success' => false,
                        'error' => 'validate error',
                    ], 200);
                } else {
                    /* Upload file */
                    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $location)) {
                        return response()->json([
                            'success' => true,
                            'filename' => $filename,
                        ], 200);
                    } else {
                        return response()->json([
                            'success' => false,
                            'error' => 'upload error',
                        ], 200);
                    }
                }
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

    public function createProduct(Request $request)
    {
        try {
            $validator = validateProduct::validate($request);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->messages(),
                ], 200);
            }else{
                $productCode = $request->input('product_code');
                $productName = $request->input('name');
                $idSupplier = $request->input('supplier');
                $productPrice = $request->input('price');
                $discount = $request->input('discount');
                $quantity = $request->input('quantity');
                $idCategory = $request->input('id-category');
                $status = $request ->input('status');
                $image = $request->input('img');
                $brand = $request->input('brand');
                $description = $request ->input('description');
                $data = [
                    'product_code' => $productCode,
                    'product_name' => $productName,
                    'category_id' => $idCategory,
                    'product_image' => $image,
                    'product_price' => $productPrice,
                    'product_brand' => $brand,
                    'product_discount' => $discount,
                    'product_quantity' => $quantity,
                    'product_description'=>$description,
                    'supplier_id'=>$idSupplier,
                    'product_status' =>$status
                ];
                    $createProduct = Product::insertProduct($data);
                    if (isset($createProduct)) {
                        return response()->json([
                            'success' => true,
                        ], 200);
                    }else{
                        return response()->json([
                            'success' => false,
                            'error' => 'Thêm sản phẩm thất bại thất bại',
                        ], 200);
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

    public function showProduct(Request $request, $id){
        $dataProduct = Product::find($id);
        $dataCategory = Category::all();
        $dataSupplier = Supplier::all();
        return view('Product.update', ['data'=>$dataProduct, 'cate'=>$dataCategory, 'supplier'=>$dataSupplier]);
    }
    public function UpdateProduct(Request $request)
    {
        try {
////            var_dump(1);die();
            $validator = validateProduct::validate($request);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->messages(),
                ], 200);
            }else{
                $id = $request->input('product-id');
                $productCode = $request->input('product_code');
                $productName = $request->input('name');
                $idSupplier = $request->input('supplier');
                $productPrice = $request->input('price');
                $discount = $request->input('discount');
                $quantity = $request->input('quantity');
                $idCategory = $request->input('id-category');
                $status = $request ->input('status');
                $image = $request->display_img;;
                $brand = $request->input('brand');
                $description = $request ->input('description');
                $data = [
                    'product_code' => $productCode,
                    'product_name' => $productName,
                    'category_id' => $idCategory,
                    'product_image' => $image,
                    'product_price' => $productPrice,
                    'product_brand' => $brand,
                    'product_discount' => $discount,
                    'product_quantity' => $quantity,
                    'product_description'=>$description,
                    'supplier_id'=>$idSupplier,
                    'product_status' =>$status
                ];
                Product::updateProduct($data, $id);
                return response()->json([
                    'success' => true,
                    'message' =>'Sửa User thành công'
                ], 200);
            }
//
        } catch (\Exception $e) {
            Log::info('Start postLogin');
            Log::error($e->getMessage());
            return response()->json([
                'success' => true,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

//delete product
    public function deleteProduct(Request $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return response()->json([
                'success' => true,
            ], 200);
        }catch (\Exception $e) {
            Log::info('Start postLogin');
            Log::error($e->getMessage());
            return response()->json([
                'success' => true,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
}
