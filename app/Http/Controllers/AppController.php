<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Validator;
use App\Models\User;

class AppController extends Controller
{
    //
    public function register(Request $request)
    {
       echo "Dddbs sd hvns";
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required|min:6',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json(['error' => $validator->errors()], 422);
        // }

        // /**Check Email is already exist or not */

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'status' =>'1'
        // ]);
        // if($user->id >0){
        //     $response = [
        //         'STATUS'    => 'Success',
        //         'MESSAGE'   => 'Registration successful',
        //         'STATUS_CODE'=> '200'
        //     ];
        // }
        // else{
        //     $response = [
        //         'STATUS'    => 'Failed',
        //         'MESSAGE'   => 'Registration Failed, try again',
        //         'STATUS_CODE'=> '201'
        //     ];
        // }      
        // return response()->json($response, 201);
    }

    public function login()
    {
        echo"logiin";
    }
}
