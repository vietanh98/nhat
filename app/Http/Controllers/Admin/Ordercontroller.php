<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Http\Controllers\validateBlog;
use App\Order;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\DB;
use App\OrderDetail;
use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class Ordercontroller extends Controller
{
    public function showListOrder(Request $request){
        try {
            $keyword = $request->keyword;
            $dataOrder = Order::getListOrder(UserProfile::phantrang, $keyword);
            $links = $dataOrder->appends(['perPage' => UserProfile::phantrang]);
            return view('Order.index', ['dataOrder' => $dataOrder, 'link'=>$links]);
        } catch (\Exception $e) {
            Log::info('Start postLogin');
            Log::error($e->getMessage());
            return response()->json([
                'success' => true,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
    public function CreateOrder(Request $request){
        try {
            DB::transaction(function() use($request) {

                $post = new Order;
                $post->user_id = 0;
                $post->user_name = $request->customer_name;
                $post->phone = $request->phone;
                $post->address = $request->address;
                $post->payment_methods = $request->payment_method;
                $post->note = $request->order_note;
                $post->status = 1;
                $post->save();
                $order_id = Order::get();
                foreach ($order_id as $item){
                    $id = $item->order_id;
                }
                $postDetailOrder = new OrderDetail;
                $postDetailOrder->order_id = $id;
                $postDetailOrder->product_id = $request->product_code;
                $postDetailOrder->odetail_unit_price = $request->product_price;
                $postDetailOrder->odetail_quantity = $request->product_quantity;
                $postDetailOrder->odetail_quantity = $request->product_quantity;
                $postDetailOrder->odetail_total_money = $request->total_money;
                $postDetailOrder->save();
            });
            return redirect('JapanCosmetic');
        } catch (\Exception $e) {
            Log::info('Start postLogin');
            Log::error($e->getMessage());
            return response()->json([
                'success' => true,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
    public function showOrder(Request $request, $id){
        $order = Order::find($id);
        return view('order.update', ['order'=>$order]);
    }
    public function updateOrder(Request $request)
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
}
