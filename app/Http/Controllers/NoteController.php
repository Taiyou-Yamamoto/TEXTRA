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
        $notes = Note::where('book_id', $id)->orderby('created_at', 'desc')->paginate(5);


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
            'user_id' => Auth::user()->id,
            'type' => $book->type,
            'content' => $validated['note'],
            'page_number' => $validated['page_number'] ?? null,
        ]);


        session()->flash('message', '登録しました！');

        return redirect()->route('note.register', ['id' => $id])
            ->with('message', '登録しました！');
    }

    public function allNote(Request $request)
    {
        $id = Auth::user()->id;
        $notes = Note::with('book')->where('user_id', $id)->orderby('created_at', 'desc')->paginate(10);

        return view('note.allNote', compact('notes'));
    }

    public function destroy($id)
    {
        $note = Note::find($id);
        $book_id = $note->book_id;

        $note->delete();

        return redirect()->route('note.register', ['id' => $book_id]);
    }

    public function allNoteDestroy($id)
    {
        $note = Note::find($id);
        $note->delete();

        return redirect()->route('note.allNote')->with('message', 'メモが削除されました。');
    }
}
