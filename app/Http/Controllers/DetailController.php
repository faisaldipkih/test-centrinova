<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Entry;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index($slug)
    {
        $data['detail'] = Entry::where('slug', $slug)->first();
        $data['comments'] = Comment::where('entry_id', $data['detail']['id'])->orderBy('id', 'DESC')->paginate(3);
        return view('detail_entry', $data);
    }
}
