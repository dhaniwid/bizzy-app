<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'name' => 'required|string|max:50'
        ],
        [
            'email.required' => 'Email is required!',
            'name.required' => 'Name is required!',
            'email.unique' => 'Email has already been used',
            'email.email' => 'is invalid'
        ]);

        if ($validator->fails()) {
            $failedRules = $validator->errors()->first('email');
            if ($failedRules == 'is invalid'){
                return response()->json([
                    'email' => $request->email,
                    'message' => $failedRules,
                    'status' => 'false'
                ], 400);    
            }

            return response()->json([
                'email' => $request->email,
                'message' => $failedRules,
                'status' => 'false'
            ], 409);
        }
        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return response()->json([
                'id' => $user->id,
                'name' => $user->email,
                'status' => 'true'
            ], 200);
    }

    
}
