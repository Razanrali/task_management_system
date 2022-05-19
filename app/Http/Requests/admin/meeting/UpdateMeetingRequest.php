<?php

namespace App\Http\Requests\admin\meeting;

use App\Models\Department;
use App\Models\Meeting;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateMeetingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::check()) {
            return Auth::user()->can('update',Meeting::class);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=>'required',
            'discussion_point'=>'required|max:250',
            'meeting_date'=>'required|date',
            'start_at'=>'required|date_format:"H:i"',
            'participant_list'=>'required',
            'status'=>'required'
        ];
    }
}
