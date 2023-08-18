<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'body',
    ];

    // for filtering result
    public function scopeFilter($query, array $filters) {
        
        // filter for search
        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%');
        }
    }

    // relationship to user
    public function user() {
        return $this->belongsTo(User::class);
    }

    // relationship to comment
    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
