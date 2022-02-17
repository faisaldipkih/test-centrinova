<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'user_id', 'isi_entry', 'img', 'slug'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
