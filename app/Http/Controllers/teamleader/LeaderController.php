<?php

namespace App\Http\Controllers\teamleader;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\user\CreateUserRequest;
use App\Models\Leader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaderController extends Controller
{

    public function index()
    {
        //
    }


    public function store(CreateUserRequest  $request)
    {
      /*  $imagename = time() . '-' . $request->name . '.' . $request->img_url->extension();
        $request->img_url->move('product_image', $imagename);
        $url_img=URL::asset('product_image/'.$imagename);*/

        $data=Leader::query()->create([

            'img_profile'=>$request->img_profile,//'mimes:jpg,png,jpeg'
            'phone'=>$request->phone,
            'contact'=>$request->contact,
            'education'=>$request->education,
            'experience'=>$request->experience,
             'user_id'=>Auth::id(),// only put it inside the request
        ]);
        return response()->json(['message'=>'new user is added','the info:'=>$data]);

    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
