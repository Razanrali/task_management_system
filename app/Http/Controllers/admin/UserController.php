<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\user\CreateUserRequest;
use App\Http\Requests\admin\user\UpdateUserRequest;
use App\Models\Department;
use App\Models\User;
use Cassandra\Exception\UnpreparedException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //to show all user thar i added
    public function index()
    {

    }

    //to create the user
    public function store(CreateUserRequest $request)
    {
        $user_data=User::query()->create([
            'first_name'=>$request->first_name,
              'last_name'=>$request->last_name,
            'email'=>$request->email,
            'ID_num'=>$request->ID_num,
            'password'=>$request->password,
            'role_id'=>$request->role_id,
            'department_id'=>$request->department_id
        ]);

        return response()->json(['message'=>'new user is added','the user is:'=>$user_data]);

    }

    //to specific user
    public function show($id)
    {

    }


    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update([
        'first_name'=>$request->first_name,
        'last_name'=>$request->last_name,
        'email'=>$request->email,
        'ID_num'=>$request->ID_num,
        'password'=>$request->password,
        'role_id'=>$request->role_id,
            'department_id'=>$request->department_id
    ]);
        return response()->json(['message'=>'user is updated','the user is:'=>$user]);

    }

   // to delete user
    public function destroy(User $user)
    {
        if(Auth::check())
        {
            $this->authorize('delete',User::class);
            $user->delete();
            return response()->json(['message'=>'deleted is done']);
        }

    }
}
