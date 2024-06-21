<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\validateCategory;
use App\Http\Controllers\validateUser;
use App\User;
use App\UserProfile;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    // Hiển thị danh mục
    public function ListCategory(Request $request)
    {
        try {
            $keyword = $request->keyword;
            $category = Category::getListCategory(UserProfile::phantrang, $keyword);
            $links = $category->appends(['perPage'=>UserProfile::phantrang]);
            return view('Category.index', ['data_category'=>$category, 'links'=>$links]);
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

    public function showCreateCategory(){
        return view('Category.create');
    }
    //Thêm danh mục
    public function createCategory(Request $request){
        try {
            $validator = validateCategory::validate($request);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->messages(),
                ], 200);
            }
            else{
                    $categoryName= $request->cate_name;
                    $description = $request->description;
                    $data = [
                      'category_name' => $categoryName ,
                      'description' => $description
                    ];
                    Category::insertCategory($data);
                    return response()->json([
                        'success' => true,
                        'messages'=> 'Thêm danh mục thành công'
                    ], 200);
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
    //Sửa danh mục
    public function showCategory(Request $request, $id){
        $category = Category::find($id);
        return view('Category.update', ['category'=>$category]);
    }
    public function updateCategory(Request $request)
    {
        try {
            $validator = validateCategory::validate($request);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->messages(),
                ], 200);
            }else{
                $categoryName = $request->input('cate_name');
                $description = $request->input('description');
                $id = $request->cate_id;
                $data = [
                    'category_name' => $categoryName,
                    'description' => $description
                ];
                Category::updateCategory($data, $id);
                return response()->json([
                    'success' => true,
                ], 200);

            }

        }catch (\Exception $e) {
            Log::info('Start postLogin');
            Log::error($e->getMessage());
            return response()->json([
                'success' => true,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
    public function deleteCategory(Request $request, $cate_id){
        $category = Category::findOrFail($cate_id);
        $category->delete();
        return response()->json([
            'success' => true,
        ], 200);
    }
}
