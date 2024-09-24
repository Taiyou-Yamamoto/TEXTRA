<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //  ホーム画面表示
    public function index()
    {
        $comments = [
            "本文を読む前に目次や、あとがきを見ると自分にとって役に立つ本か確認できるよ！",
            "『速読』より『多読』",
            "読む前に目的を決めて,情報を取捨選択選。",
            "読んでいて自分に合わないと思ったら、読むのをやめることも一つの手。",
            "値段の高い本があなたにとって価値ある本ではない。大事なのは本の中身だ。",
            "たまには直感で面白そうな本を読んでみよう!",
            "同じカテゴリーの本を複数読むことで,共通して大切なことが見えてくるよ。",
            "ネット書店と実際の書店を使い分けよう!  実際に見てみると視野が広がるよ。",
            "あなたはどのように本を読んでいますか？  私(開発者)はKindle派です。",
            "オンラインで本を探すときは,『なか見検索』を使ってみよう！",
            "慣れてないうちは月に一冊を目指そう。",
            "読んだままで終わらせない。メモを読み返して忘れないようにしよう！",
            "メモを書いて満足しない。実践してみよう!",
            "一冊の本で重要なポイントは全体の20%ほどしかない",
            "やる気から行動が生まれるのではなく、行動からやる気が生まれる。1ページだけでも読もう!",
            "新しい習慣を作るには、今やっている習慣の後にやる癖をつけよう　(例, お風呂の後に10分だけ読書)"
        ];

        $randomComment = $comments[array_rand($comments)];

        $books = Auth::user()->books->sortByDesc('created_at');
        $books['img'] = Storage::disk('s3')->directories('covers/');
        dd($books['img']);
        return view('home', compact('books', 'randomComment'));
    }
}
