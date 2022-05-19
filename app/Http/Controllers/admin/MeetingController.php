<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\meeting\CreateMeetingRequest;
use App\Http\Requests\admin\meeting\UpdateMeetingRequest;
use App\Http\Requests\admin\task\UpdateTaskRequest;
use App\Models\Department;
use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\at;

class MeetingController extends Controller
{
    public $temp_array;

    public function index()
    {
        //
    }


    public function store(CreateMeetingRequest $request)
    {
        $meeting=Meeting::query()->create([
            'title'=>$request->title,
            'discussion_point'=>$request->discussion_point,
            'meeting_date'=>$request->meeting_date,
            'start_at'=>$request->start_at,
            'status'=>$request->status
        ]);

        foreach ($request->participant_list as $i)
        {
            $meeting->users()->attach($i);
        }
        return response()->json(['message'=>' done']);
    }


    public function show($id)
    {
        //
    }


    public function update(UpdateMeetingRequest $request, Meeting $meet)
    {
        $meet->update([
            'title'=>$request->title,
            'discussion_point'=>$request->discussion_point,
            'meeting_date'=>$request->meeting_date,
            'start_at'=>$request->start_at,
            'status'=>$request->status
        ]);

      foreach ($request->participant_list as $i) {
            $temp_array[]=$i;
        }

        $meet->users()->sync($temp_array);
        return response()->json(['message'=>'updating done']);
    }

    public function destroy(Meeting $meet)
    {   if(Auth::check())
      {
        $this->authorize('delete',Meeting::class);
        $meet->delete();
        return response()->json(['message'=>'deleted is done']);
      }

    }
}
