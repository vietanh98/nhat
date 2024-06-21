<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Blog;
use App\Http\Controllers\validateBlog;
use App\Http\Controllers\validateCategory;
use App\Supplier;
use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{

    public function showListBlog(Request $request){
        try {
            $keyword = $request->keyword;
            $dataBlog = Blog::getListBlog(UserProfile::phantrang, $keyword);
            $links = $dataBlog->appends(['perPage' => UserProfile::phantrang]);
//            $auth = Auth::user();
            return view('Blog.index', ['blog' => $dataBlog, 'link'=>$links]);
        } catch (\Exception $e) {
            Log::info('Start postLogin');
            Log::error($e->getMessage());
            return response()->json([
                'success' => true,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
    public function showCreateBlog(Request $request){
        try {
            return view('Blog.create');
        } catch (\Exception $e) {
            Log::info('Start postLogin');
            Log::error($e->getMessage());
            return response()->json([
                'success' => true,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
    public function createBlog(Request $request)
    {
        try {
            $validator = validateBlog::validate($request);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->messages(),
                ], 200);
            }else{
                $blogTitle = $request->input('title');
                $htmlContent = $request->input('editor');
                $userId = Auth::id();
                $data = [
                    'blog_title' => $blogTitle,
                    'html_content' => $htmlContent,
                    'plain_text_content' => strip_tags($htmlContent),
                    'user_id' => $userId,
                ];
                $createBlog = Blog::insertBlog($data);
                if (isset($createBlog)) {
                    return response()->json([
                        'success' => true,
                    ], 200);
                }else{
                    return response()->json([
                        'success' => false,
                        'error' => 'Thêm blog thất bại thất bại',
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

    //Sửa danh mục
    public function showBlog(Request $request, $id){
        $blog = Blog::find($id);
        return view('blog.update', ['blog'=>$blog]);
    }
    public function updateBlog(Request $request)
    {
        try {
            $validator = validateBlog::validate($request);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->messages(),
                ], 200);
            }else{
                $blogTitle = $request->input('title');
                $htmlContent = $request->input('editor');
                $id = $request->blog_id;
                $data = [
                    'blog_title' => $blogTitle,
                    'html_content' => $htmlContent,
                    'plain_text_content' => strip_tags($htmlContent),
                ];
                Blog::updateBlog($data, $id);
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
    public function deleteBlog(Request $request, $blog_id){
        $blog = Blog::findOrFail($blog_id);
        $blog->delete();
        return response()->json([
            'success' => true,
        ], 200);
    }

}
