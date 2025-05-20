<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;    // para la relación con User
use App\Models\Comment; // para la relación con Comment
use App\Models\Like;    // para la relación con Like

class Post extends Model
{
    use HasFactory;

    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'user_id',
        'content',
    ];

    // Relación con el usuario (autor)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con comentarios
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Relación con likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
