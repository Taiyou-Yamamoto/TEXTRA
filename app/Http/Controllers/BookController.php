<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

        $rules = [
            'title' => 'required|string|max:100',
            'type' => 'required|string|max:20',
            'image_path' => 'nullable|image'
        ];

        $messages = [
            'title.required' => 'タイトルを入力してください。',
            'title.max' => 'タイトルは１００文字以下にしてください。',
            'type.required' => '種別を入力してください。',
            'type.max' => '種別は20文字以下にしてください。',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

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

        session()->flash('message', '登録しました！');

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
