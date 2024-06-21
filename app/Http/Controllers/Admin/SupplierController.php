<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\validateSupplier;
use App\Product;
use App\Supplier;
use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SupplierController extends Controller
{
        public function showListSupplier(Request $request){
            try {
                $keyword = $request->keyword;
                $dataSupplier = Supplier::getListSupplier(UserProfile::phantrang, $keyword);
                $links = $dataSupplier->appends(['perPage' => UserProfile::phantrang]);
//            $auth = Auth::user();
                return view('Supplier.index', ['supplier' => $dataSupplier, 'link'=>$links]);
            } catch (\Exception $e) {
                Log::info('Start postLogin');
                Log::error($e->getMessage());
                return response()->json([
                    'success' => true,
                    'message' => $e->getMessage(),
                ], 400);
            }
        }
    public function showCreateSupplier(Request $request){
        try {
            return view('Supplier.create');
        } catch (\Exception $e) {
            Log::info('Start postLogin');
            Log::error($e->getMessage());
            return response()->json([
                'success' => true,
                'message' => $e->getMessage(),
            ], 400);
        }
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

    public function createSupplier(Request $request)
    {
        try {
            $validator = validateSupplier::validate($request);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->messages(),
                ], 200);
            }else{
                $supplierName = $request->input('name');
                $supplierAddress = $request->input('address');
                $supplierPhone = $request->input('phone');
                $supplierEmail = $request->input('email');
                $supplierLogo = $request->input('img');
                $data = [
                    'supplier_name' => $supplierName,
                    'supplier_address' => $supplierAddress,
                    'supplier_phone' => $supplierPhone,
                    'supplier_email' => $supplierEmail,
                    'supplier_logo' => $supplierLogo,
                ];
                $createSupplier = Supplier::insertSupplier($data);
                if (isset($createSupplier)) {
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

    //Update Supplier
    public function showSupplier(Request $request, $id){
        $dataSupplier = Supplier::find($id);
        return view('Supplier.update', ['supplier'=>$dataSupplier]);
    }

    public function updateSupplier(Request $request)
    {
        try {
            $validator = validateSupplier::validate($request);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->messages(),
                ], 200);
            }else{
                $supplierName = $request->input('name');
                $supplierAddress = $request->input('address');
                $supplierPhone = $request->input('phone');
                $supplierEmail = $request->input('email');
                $supplierLogo = $request->input('display_img');
                $id = $request->supplier_id;
                $data = [
                    'supplier_name' => $supplierName,
                    'supplier_address' => $supplierAddress,
                    'supplier_phone' => $supplierPhone,
                    'supplier_email' => $supplierEmail,
                    'supplier_logo' => $supplierLogo,
                ];
                $createSupplier = Supplier::updateSupplier($data, $id);
                if (isset($createSupplier)) {
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
    public function deleteSupplier(Request $request, $id)
    {
        try {
            $supplier = Supplier::findOrFail($id);
            $supplier->delete();
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
