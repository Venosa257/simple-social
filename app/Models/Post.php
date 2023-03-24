<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Bookmark;
use App\Models\Like;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['user'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookmark()
    {
        return $this->hasOne(Bookmark::class);
    }

    public function like()
    {
        return $this->hasOne(Like::class);
    }
}