<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['entry'] = Entry::paginate(12);
        return view('home', $data);
    }
}
