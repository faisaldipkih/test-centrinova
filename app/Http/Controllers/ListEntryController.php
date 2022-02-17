<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ListEntryController extends Controller
{
    public function index()
    {
        $data['entry'] = Entry::paginate(10);
        return view('list_entry', $data);
    }

    public function edit($slug)
    {
        $data['entry'] = Entry::where('slug', $slug)->first();
        return view('form_entry', $data);
    }

    public function store()
    {
        $validate = request()->validate([
            'user_id' => 'required',
            'judul' => 'required|unique:entries|max:255',
            'isi_entry' => 'required',
            'img' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);
        $path = request()->file('img')->store('public/images');
        $validate['img'] = Str::of($path)->afterLast('/');
        $validate['slug'] = Str::slug($validate['judul'], '-');
        $post = Entry::create($validate);
        return redirect('/list-entry')->with('message', 'Data entry berhasil ditambah ' . $post->judul);
    }

    public function update()
    {
        if (request()->file('img') != null) {
            $validate = request()->validate([
                'id' => 'required',
                'judul' => 'required|max:255',
                'isi_entry' => 'required',
                'img' => 'image|mimes:jpg,jpeg,png|max:2048'
            ]);
            $path = request()->file('img')->store('public/images');
            $validate['img'] = Str::of($path)->afterLast('/');
        } else {
            $validate = request()->validate([
                'id' => 'required',
                'judul' => 'required|max:255',
                'isi_entry' => 'required',
            ]);
            unset($validate['img']);
        }
        $validate['slug'] = Str::slug($validate['judul'], '-');
        Entry::where('id', $validate['id'])->update($validate);
        return redirect('/list-entry')->with('message', 'Data entry berhasil diupdate ');
    }

    public function delete($slug)
    {
        Entry::where('slug', $slug)->delete();
        return redirect('/list-entry')->with('message', 'Data entry berhasil didelete');
    }
}
