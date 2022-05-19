<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    use HasFactory;

   // to use them in policy
    public const admin= 3;
    public const team_leader=1;
    public const team_member=2;

    protected $fillable = [
        'position',
    ];




    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class,'role_id');
    }



}
