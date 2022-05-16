<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class UserController extends Controller
{

    public function getAllUsers(){
        return User::all();
    }

    public function getUserById($id){
        return User::find($id);
    }

    public function deleteUser($id){
        $user = User::find($id);
        if(isset($user)){
            $user->delete();

            $respond = [
                'status' => 201,
                'message' => 'User deleted',
                'data' => $user,
            ];
        }
        else{
            $respond = [
                'status' => 403,
                'message' => 'User not found',
            ];
        }

        return $user;
    }

    public function updateUser(Request $request, $id){
        $user = User::find($id);
        if(isset($user)){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->is_admin = $request->is_admin;
            $user->save();

            $respond = [
                'status' => 201,
                'message' => 'User updated',
                'data' => $user,
            ];
        }

        else{
            $respond = [
                'status' => 403,
                'message' => 'User not found',
            ];
        }

        return $respond;
    }

    public function authenticate(Request $request){
        $credentials = $request->only('email', 'password');
              try {
        if (! $token = JWTAuth::attempt($credentials)) {
                           return response()->json(['error' => 'invalid_credentials'], 400);
                           }
                   } catch (JWTException $e) {
                       return response()->json(['error' => 'could_not_create_token'], 500);
                   }
                   return response()->json(compact('token'));
               }
    
    public function register(Request $request){
               $validator = Validator::make($request->all(), [
               'name' => 'required|string|max:255',
               'email' => 'required|string|email|max:255',
               'password' => 'required|string|min:6',]);
           if($validator->fails()){
                   return response()->json($validator->errors()->toJson(), 400);}
           $user = User::create([
               'name' => $request->get('name'),
               'email' => $request->get('email'),
               'password' => Hash::make($request->get('password')),]);
           $token = JWTAuth::fromUser($user);
           return response()->json(compact('user','token'),201);}

    
}
