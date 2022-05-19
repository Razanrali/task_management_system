<?php

namespace App\Policies;



use App\Models\Meeting;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LeaderPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, LeaderPolicy $leaderPolicy)
    {
        //
    }


    public function create(User $user)
    {
        return $user->role_id==Role::team_leader;
    }


    public function update(User $user, LeaderPolicy $leaderPolicy)
    {
        return $user->role_id==Role::admin;
    }


    public function delete(User $user, LeaderPolicy $leaderPolicy)
    {
        //
    }


    public function restore(User $user, LeaderPolicy $leaderPolicy)
    {
        //
    }


    public function forceDelete(User $user, LeaderPolicy $leaderPolicy)
    {
        //
    }
}
