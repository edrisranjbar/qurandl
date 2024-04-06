<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getUpdatedAgoAttribute()
    {
        return Carbon::parse($this->updated_at)->locale('fa')->diffForHumans();
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')
            ->orderBy('created_at', 'desc');
    }

    public function confirmedReplies()
    {
        return $this->hasMany(Comment::class, 'parent_id')
            ->where('confirmed', 1)
            ->orderBy('created_at', 'desc');
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
