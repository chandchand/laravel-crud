<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class TaskModel extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = ['name', 'description', 'user_id'];

    protected $casts = ['user_id' => 'int'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

