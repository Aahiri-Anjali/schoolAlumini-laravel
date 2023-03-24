<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $admin = Admin::where('email', 'admin@admin.com')->first();
        $validator = Validator::make($request->all(), ['userName' => 'required|email',
            'password' => 'required|min:6']);
        if ($validator->fails()) {
            $response = response()->json(['status' => 422, 'errors' => $validator->errors()]);
        } else {
            if ($request->userName == "admin@admin.com" && $request->password == Hash::check($request->password, $admin->password)) {
                $response = response()->json(['status' => 200,
                    'data' => 'Login successfully']);
            } else {
                $response = response()->json(['status' => 402,
                    'error' => 'Email or Password is not matched']);
            }
        }
        return $response;
    }
}
