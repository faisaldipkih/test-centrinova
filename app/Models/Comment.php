<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['entry_id', 'nama', 'email', 'isi'];

    public function entry()
    {
        return $this->belongsTo(Entry::class);
    }
}
