<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return response()->json($user, 200);
    }

    public function find($id)
    {
        $user = User::find($id);
        if($user){
            return response()->json($user, 200);
        }

        return response()->json(["index no existente"], 404);
    }

    public function login(Request $request)
    {
        $user = User::all()->where('nickname', $request->nickname)->first();

        if($user){
            if (Hash::check($request->password , $user->password)) {
                return response()->json(["login succesfully"], 200);
            }
            return response()->json(["login failed"]);
        }
        return response()->json(["user not found"], 404);

    }

    public function create(Request $request)
    {
        $exist = User::all()->where('nickname', $request->nickname)->first();

        if(!$exist){
            $user = new User;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->nickname = $request->nickname;
            $user->password = Hash::make($request->password);
            $user->created_at = date("Y-m-d");
            $user->save();
            return response()->json($user, 200);
        }
        return response()->json(["nickname already exist"], 400);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if($user){
            $exist = User::all()->where('nickname', $request->nickname)->first();

            if($exist && $exist->nickname !== $user->nickname){
                return response()->json(["nickname already exist"], 400);
            }

            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->nickname = $request->nickname;
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json($user, 200);
            
        }
        return response()->json(["index no existente"], 404);
    }

}
