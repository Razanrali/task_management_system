<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\Subtask;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubtaskPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, Subtask $subtask)
    {
        //
    }


    public function create(User $user)
    {
        return $user->role_id==Role::team_leader;
    }


    public function update(User $user)
    {
        $user->role_id==Role::team_leader;
    }


    public function delete(User $user)
    {
        $user->role_id==Role::team_leader;
    }


    public function restore(User $user, Subtask $subtask)
    {
        //
    }

    public function forceDelete(User $user, Subtask $subtask)
    {
        //
    }
}
