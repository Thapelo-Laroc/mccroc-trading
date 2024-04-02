<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['instrument', 'signal', 'news', 'comment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isCreatedByAdmin()
    {
        return $this->is_admin;
    }
}

