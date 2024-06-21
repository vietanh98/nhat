<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use App\UserProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MainController extends Controller
{
    public function dashboard()
    {
        try {
            $user = UserProfile::countUser();
            $countProduct = Product::count();
            return view('page.index', ['countUser' => $user, 'countProduct' => $countProduct]);
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
