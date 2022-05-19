<?php

namespace App\Http\Requests\teamleader\leader;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateLeaderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::check())
            return Auth::user()->can('create',User::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'img_profile'=>'',//'mimes:jpg,png,jpeg'
            'phone'=>'required|numeric|min:10',
            'contact'=>'max:200',
            'education'=>'min:10|max:100',
            'experience'=>'min:20|max:100',
          // 'user_id', only put it inside the request
        ];
    }
}
