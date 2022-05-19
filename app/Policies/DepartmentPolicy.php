<?php

namespace App\Policies;

use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DepartmentPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, Department $department)
    {
        //
    }


    public function create(User $user)
    {
        return $user->role_id==Role::admin;
    }


    public function update(User $user)
    {
        return $user->role_id==Role::admin;
    }


    public function delete(User $user)
    {
        return $user->role_id==Role::admin;
    }


    public function restore(User $user, Department $department)
    {
        //
    }


    public function forceDelete(User $user, Department $department)
    {
        //
    }
}
