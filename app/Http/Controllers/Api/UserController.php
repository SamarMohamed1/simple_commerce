<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $input = $request->all();

        if(User::where('email',$input['email'])->exists()){
            return response()->json(["this email already has account"],403);
        }else{

        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        $success['token'] =  $user->createToken('MyApp')->plainTextToken;

        event(new Registered($user));
        return response()->json(["done",$success], 200);
        }
    }

    public function login(RegisterRequest $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

            $user = Auth::user();

            $success['token'] =  $user->createToken('MyApp')->plainTextToken;

           return response()->json($success['token'] , 200);

        }else{
            return response()->json("invalid email or password" , 403);
        }
    }

    public function update(Request $request){

        $input=$request->all();
        User::where('id',$request->user()->id)->update([
            'name'=>$input['name'],
            'email'=>$input['email'],
            'phone'=>$input['phone'],
            'password'=>$input['password'],
            'image'=>$input['image'],
        ]);
    }

    public function logout(Request $request)
    {
        // if (Auth::check()) {
        //    Auth::user()->AauthAcessToken()->delete();
        // }
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }





}
