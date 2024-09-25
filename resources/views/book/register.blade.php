@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1 class='text-center pt-12 font-semibold text-2xl gray_shadow'>新しい本を追加</h1>
@stop

@section('content') <div
        class="row">
        <div class="col-md-10 mx-auto">

            <div class="card card-primary h-90 w-8/12 mx-auto">
                <form action="{{ route('book.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body flex h-90">
                        <div class="w-80 pt-3 mt-6 rounded">
                            {{-- イメージ --}}
                            <img id="displayImage" name="img_path"
                                src="{{ old('img_path') ? asset(img_path) : asset('img/bookimage.jpg') }}" alt=""
                                class="aspect-3/5 h-4/6 w-3/5 mx-auto mb-4 rounded-md">

                            {{-- アップロード --}}
                            <div class="flex flex-col items-start space-y-4 ml-6">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="file_input">表紙を変更する場合は画像を選んでください</label>
                                <input
                                    class="block w-full text-sm file:p-2 file:font-semibold file:cursor-pointer text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    id="file_input" type="file" name="image_path" accept=".jpg, .png">
                            </div>
                            @if ($errors->any())
                                <li class="list-none text-red-600 text-sm text-center">もう一度画像をアップロードしてください</li>
                            @endif

                        </div>
                        {{-- タイトル --}}
                        <div class="flex-grow-1 mx-4 mt-5">
                            <div class="form-group mt-5 mb-3">
                                <label for="title" class="gray_shadow">タイトル</label>
                                <input type="text" class="form-control " id="title" name="title"
                                    placeholder="本のタイトル" value="{{ old('title') }}">
                            </div>
                            @if ($errors->has('title'))
                                <li class="list-none text-red-600">{{ $errors->first('title') }}</li>
                            @endif

                            {{-- 種別 --}}
                            <div class="form-group mt-6">
                                <label for="type" class="gray_shadow">種別</label>
                                <input id="type" type="text" class="form-control" id="種別" name="type"
                                    placeholder="種別" value="{{ old('type') }}">
                            </div>
                            @if ($errors->has('type'))
                                <li class="list-none text-red-600">{{ $errors->first('type') }}</li>
                            @endif

                        </div>

                    </div>

                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary shadow hover:shadow-none">本を登録</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    @stop

    @section('css')
        @vite(['resources/css/home.css'])
    @stop

    @section('js')
        <script>
            //file_inputが変わったら、displayImageが変わるようにしたい
            document.addEventListener('DOMContentLoaded', function() {
                const fileInput = document.getElementById('file_input');
                const displayImage = document.getElementById('displayImage');

                fileInput.addEventListener('change', () => {
                    const file = fileInput.files[0];
                    if (file) {
                        const reader = new FileReader();

                        // onloadを先に定義すると、onloadがreadAsDataURLを見逃す可能性がなくなる
                        // データURLをsrcに挿入
                        reader.onload = function(e) {
                            displayImage.src = e.target.result;
                        };
                        // ファイルをデータURLとして読み込む
                        reader.readAsDataURL(file);
                    }
                });
            })
        </script>

    @stop
