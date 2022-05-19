<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'start_date',
        'end_date',
        'status',
        'department_id'
    ];

    public function department(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Department::class,'department_id');
    }

    public function subtasks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Subtask::class,'task_id');
    }
    public function attachment(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Attachment::class,'task_id');
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class,'task_id');
    }
}
