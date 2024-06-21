<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\validateUser;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    public function login()
    {
        return view('login.index');
    }

    public function postLogin(LoginRequest $request)
    {
        try {
            Log::info('Start postLogin');
            $email = $request->input('email');
            $password = $request->input('password');

            $valid = Auth::attempt(['email' => $email, 'password' => $password]);
            if ($valid) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
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

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function showListUser(Request $request)
    {
        try {
            $keyword = $request->keyword;
            $dataUser = UserProfile::getListUser(UserProfile::phantrang, $keyword);
            $links = $dataUser->appends(['perPage' => UserProfile::phantrang]);
//            $auth = Auth::user();
            return view('Users.index', ['user' => $dataUser, 'link'=>$links]);
        } catch (\Exception $e) {
            Log::info('Start postLogin');
            Log::error($e->getMessage());
            return response()->json([
                'success' => true,
                'message' => $e->getMessage(),
            ], 400);
        }

    }

    public function showCreateUser()
    {
        return view('Users.create');
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

    public function createUser(Request $request)
    {
        try {
            $validator = validateUser::validate($request);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->messages(),
                ], 200);
            }else{
                $message = 'Thêm Người dùng thành công';
                $userName = $request->input('name');
                $email = $request->input('email');
                $phone = $request->input('phone');
                $dateOfBirth = $request->input('date_of_birth');
                $address = $request->input('address');
                $role = $request->input('role');
                $avatar = $request->img;
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
                }else{
                    $createUser = UserProfile::createUser($data);
                    if (isset($createUser)) {
                        return response()->json([
                            'success' => true,
                            'message' => 'Thêm user thành công',
                        ], 200);
                    }else{
                        return response()->json([
                            'success' => false,
                            'error' => 'Thêm user thất bại',
                        ], 200);
                    }
                }

               }


//            }
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

    public function showUpdateUser(Request $request, $id){
        $dataUser = UserProfile::find($id);
        return view('Users.update', ['data'=>$dataUser]);
    }
    public function UpdateUser(Request $request)
    {
        try {
////            var_dump(1);die();
            $validator = validateUser::validate($request);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->messages(),
                ], 200);
            }else{
                $userName = $request->input('name');
                $email = $request->input('email');
                $phone = $request->input('phone');
                $dateOfBirth = $request->input('date_of_birth');
                $address = $request->input('address');
                $role = $request->input('role');
                $avatar = $request->display_img;
                $password = $request->input('password');
                $user_id = $request->user_id;
                $date = date('Y-m-d', strtotime($dateOfBirth));
                $data = [
                    'user_name' => $userName,
                    'email' => $email,
                    'phone' => $phone,
                    'address' => $address,
                    'date_of_birth' => $date,
                    'avatar' => $avatar,
                    'password' => bcrypt($password),
                    'role_id' => $role
                ];
                UserProfile::updateUser($data, $user_id);
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

//delete user
    public function deleteUser(Request $request, $id)
    {
        $user = UserProfile::findOrFail($id);
        dd($user);
        $user->delete();
        return response()->json([
            'success' => true,
        ], 200);

    }

}
