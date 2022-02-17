<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($id)
    {
        $data['comment'] = Comment::where('entry_id', $id)->paginate(10);
        return view('comment_manag', $data);
    }

    public function store()
    {
        $validate = request()->validate([
            'entry_id' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'isi' => 'required'
        ]);
        Comment::create($validate);
        return back()->withInput();
    }

    public function delete($id)
    {
        Comment::where('id', $id)->delete();
        return redirect('/comment')->with('message', 'Data komentar berhasil dihapus');
    }
}
