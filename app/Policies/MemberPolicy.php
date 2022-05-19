<?php

namespace App\Policies;

use App\Models\Member;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MemberPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, Member $member)
    {
        //
    }


    public function create(User $user)
    {
        return $user->role_id==Role::team_member;
    }


    public function update(User $user)
    {
        return $user->role_id==Role::team_member;
    }


    public function delete(User $user, Member $member)
    {
        //
    }


    public function restore(User $user, Member $member)
    {
        //
    }


    public function forceDelete(User $user, Member $member)
    {
        //
    }
}
