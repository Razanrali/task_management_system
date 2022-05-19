<?php

namespace App\Http\Requests\admin\user;

use App\Models\Department;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateUserRequest extends FormRequest
{

    public function authorize()
    {
        if(Auth::check())
            return Auth::user()->can('create',User::class);

    }


    public function rules()
    {
        return [
            'first_name'=>'required|string|min:3|max:20',
            'last_name'=>'required|string|min:3|max:20',
            'email'=>'required|email|max:20',
            'ID_num'=>'required|min:5|max:8',
            'password'=>'required|min:6',
            'role_id'=>'required',
            'department_id'=>'required'
        ];
    }
}
