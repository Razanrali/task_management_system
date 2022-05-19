<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Database\Eloquent\Relations;
use Laravel\Passport\HasApiTokens;
//use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

   // public $table='users';

    protected $fillable = [
       'first_name',
         'last_name',
          'email',
        'ID_num',
        'password',
        'role_id',
        'department_id',
        'remember_token'
    ];


    protected $hidden = [
        'password',

    ];



    //  relationship

    public function role(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Role::class,'role_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }

    public function leaders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Leader::class,'user_id');
    }

    public function members(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Member::class,'user-_id');
    }

    public function meetings(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Meeting::class,'meeting_user',
            'user_id','meeting_id');
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class,'user_id');
    }

    public function attachments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Attachment::class,'user_id');
    }


    public function events(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Event::class,'user_id');
    }







}
