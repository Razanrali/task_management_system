<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\department\StoreDepartmentRequest;
use App\Http\Requests\admin\department\UpdateDepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class DepartmentController extends Controller
{

    public function index()
    {

    }


    public function store(StoreDepartmentRequest $request)
    {
        $data= Department::query()->create([
            'name'=>$request->name
        ]);
        return response()->json(['message' => 'department added successfully','tha department:'=>$data]);

    }

    public function show($id)
    {
        //
    }


    public function update(UpdateDepartmentRequest $request, Department $id)
    {
         $id->update([
            'name'=>$request->name
        ]);
        return response()->json(['message' => 'department updated successfully',$id]);
    }


    public function destroy(Department $id)
    {
        if(Auth::check())
        {
            $this->authorize('delete',Department::class);
            $id->delete();
            return response()->json(['message'=>'deleted is done']);
        }


    }
}
