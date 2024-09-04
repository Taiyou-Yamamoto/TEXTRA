<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // 商品一覧取得
        $notes = Note::all();

        return view('note.index', compact('notes'));
    }

    public function register()
    {


        return view('note.register');
    }
}
