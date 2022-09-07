<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;


class UserController extends Controller
{
    public function index() {
        $users = User::all();
        // $users = User::paginate(10);
        
        return UserResource::collection($users);
    }

    public function getNames() {

        $names = User::select('id','name')->get();

        return response()->json($names);

    }

    public function store(Request $request) {


        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ]);

        // $user = new User();

        // $user->name = $request->name;
        // $user->email = $request->email;

        $user->save();

        return response()->json([
            'message' => 'User Created',
            'code' => 200
        ]);
    }

    public function retrieveUser ($id) {
        $user = User::find($id);
        
        return response()->json($user);
    }

    public function update ($id, Request $request) {

        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return response()->json([
            'message' => 'User updated',
            'code' => 200
        ]);
    }

    public function delete($id) {
        $user = User::find($id)->delete();

        if($user) {
            return response()->json([
                'message' => 'User deleted Successfully',
                'code' => 200
            ]);
        } else {
            return response()->json([
                'message' => "User with id:$id does not exist"
            ]);
        }

    }
}

