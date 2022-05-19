<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable=['title',
        'discussion_point',
        'meeting_date',
        'start_at',
        'status',
        ];

    public function users()
    {
        return $this->belongsToMany(User::class,'meeting_user',
            'meeting_id','user_id');
    }

}
