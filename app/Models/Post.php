<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subject', 'user_id'];

    public function comments(): hasMany
    {
        return $this->hasMany(Comment::class);
    }

    // public function user(): BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
