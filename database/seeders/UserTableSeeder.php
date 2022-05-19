<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         User::query()->create([
            'first_name'=>'hala',
            'last_name'=>'ali',
            'email'=>'halaali.sy2@gmail.com',
            'ID_num'=>'30205',
            'password'=>'hala123',
            'role_id'=>3,
        'department_id'=>null,
             'remember_token'=>true
         ]);

    }
}
