<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'body'
    ];

    // relationship with post
    public function post() {
        $this->belongsTo(Post::class);
    }

    // relationship with user
    public function user() {
        return $this->belongsTo(User::class);
    }
}
