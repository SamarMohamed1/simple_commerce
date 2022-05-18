<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function viewUsers(){
        $users = User::all();
        // dd($users);

        return view('viewUser', [
            'users' => $users,
        ]);
    }

    public function userForm(){
        return view('AddUser');
    }

    public function create(RegisterRequest $request){
        $data = $request->all();
        User::create([
           'name' => $data['name'],
           'email' => $data['email'],
           'phone' => $data['phone'],
           'password' => $data['password'],
       ]);
       return view('viewUser');
    }
}
