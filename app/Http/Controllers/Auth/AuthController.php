<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  RegisterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        $formData = $request->all();
        // // die($formData);

        if(isset($formData['password']) && !empty($formData['password'])){
            $formData['password'] = Hash::make($formData['password']);
        }

        if ($user = User::create($formData)) {
            return response([
                'status' => 'success',
                'message' => 'User created succesfuly',
                'data' => $user
            ], 200);
        } 
        else {
            return response([
                'status' => 'failed',
                'message' => 'Unable to create user'
            ], 500);
        }

    }

    
    public function login(Request $request)
    {
        # code...
    }
}
