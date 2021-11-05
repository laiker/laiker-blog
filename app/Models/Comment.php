<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function canDelete($currentUser)
    {
        if(!$currentUser)
            return false;   

        return ($currentUser->id == $this->user_id && now()->diffInHours($this->created_at) < 1) || $currentUser->is_admin;
    }
}
