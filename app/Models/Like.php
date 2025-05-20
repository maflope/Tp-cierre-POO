<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
    ];

    // Relación con el usuario que hizo like
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el post al que le dieron like
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
