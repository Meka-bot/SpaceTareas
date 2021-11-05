<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function project()
    {
        return $this->belongsTo(Project::class);
        return $this->hasMany(Project::class, 'id');

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');

       $user_id = User::find($id);
    }


}
