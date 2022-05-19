<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\task\CreateTaskRequest;
use App\Http\Requests\admin\task\UpdateTaskRequest;
use App\Models\Department;
use App\Models\Task;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function index()
    {

    }


    public function store(CreateTaskRequest $request)
    {
        $data= Task::query()->create([
            'title'=>$request->title,
            'description'=>$request->description,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
           // 'status'=>$request->status,
            'department_id'=>$request->department_id
        ]);


       return response()->json(['message'=>'the task is add to the department successfully','tha task is:'=>$data]);



    }


    public function show($id)
    {

    }


    public function update(UpdateTaskRequest $request, Task $task)
    {

       $data=$task->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            // 'status'=>$request->status,
            'department_id'=>$request->department_id

        ]);
        return response()->json(['message'=>'the task is updated to the department successfully',
            'tha task after updated is:'=>$data]);

    }


    public function destroy(Task $task)
    {
        if(Auth::check())
        {
            $this->authorize('delete',Task::class);
            $task->delete();
            return response()->json(['message'=>'deleted is done']);
        }

    }
}
