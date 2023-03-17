<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function login(Request $request)
    {
        $admin = Admin::where('email', 'admin@admin.com')->first();
        if ($request->email != null && $request->password != null) {
            if ($request->email == "admin@admin.com" && $request->password == Hash::check($request->password, $admin->password)) {
                $response =   response($admin);
            } else {
                $response = response(['error' => 'Email or Password is not matched']);
            }
        } else {
            $response = response(['error' => 'Email and Password are required']);
        }
        return $response;
    }
}
