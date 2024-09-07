<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Book;

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

    public function register($id)
    {
        $book = Book::findOrFail($id);
        $notes = Note::where('book_id', $id)->get(); // メモ一覧を取得

        return view('note.register', compact('book', 'notes'));
    }


    public function add(Request $request, $id)
    {

        $book = Book::findOrFail($id);


        $validated = $request->validate([
            'note' => 'required|string|max:500',
            'page_number' => 'nullable|integer|min:1|max:1000'
        ]);

        // データベースに保存
        Note::create([
            'book_id' => $book->id,
            'type' => $book->type,
            'content' => $validated['note'],
            'page_number' => $validated['page_number'] ?? null,
        ]);


        session()->flash('message', '登録しました！');

        return redirect()->route('note.register', ['id' => $id])
            ->with('message', '登録しました！');
    }
}
