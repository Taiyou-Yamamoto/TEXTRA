<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('book.register');
    }


    // 書籍登録
    public function add(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'type' => 'required|string|max:20',
            'image_path' => 'nullable|image'
        ]);

        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $imageName = $file->hashName();
            $file->storeAs('public/img', $imageName);
            $validated['image_path'] = 'storage/img/' . $imageName;
        } else {
            $validated['image_path'] = 'storage/img/bookimage.jpg';
        }

        Book::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'type' => $validated['type'],
            'image_path' => $validated['image_path'] ?? null
        ]);

        session()->flash('massage', '登録しました！');

        return redirect('/');
    }

    // 書籍とそのメモを削除
    /**
     *@param book_id
     *
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        if ($book) {
            if ($book->image_path !== 'storage/img/bookimage.jpg') {
                $imagePath = str_replace('storage/', '', $book->image_path);
                Storage::disk('public')->delete($imagePath);
            }

            $book->delete();
        }

        return redirect()->route('home');
    }
}
