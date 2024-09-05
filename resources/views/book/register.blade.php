@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1 class='text-center pt-12'>新しい本を追加</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10 mx-auto">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary h-90">
                <form action="{{ route('book.add') }}" method="POST">
                    @csrf
                    <div class="card-body flex h-90">
                        <div class="w-80 pt-3 mt-6">
                            <img id="displayImage" src="{{ asset('img/bookimage.jpg') }}" alt=""
                                class="h-4/6 w-3/5 mx-auto mb-4">
                            <div class="flex flex-col items-start space-y-4">
                                <label for="fileUpload"
                                    class="text-sm font-semibold text-gray-400">表紙を変更する場合は画像を選んでください</label>
                                <input type="file" id="fileUpload" accept="image/*,image/svg+xml"
                                    class="block w-full text-sm text-gray-500 file:border file:border-gray-300 my-0 file:py-2 file:px-4 file:rounded-md file:text-sm file:font-medium file:bg-gray-100 hover:file:bg-gray-200">
                            </div>

                        </div>

                        <div class="flex-grow-1 mx-4 my-10">
                            <div class="form-group my-5">
                                <label for="title">タイトル</label>
                                <input type="text" class="form-control " id="title" name="title"
                                    placeholder="本のタイトル">
                            </div>

                            <div class="form-group mt-6">
                                <label for="type">種別</label>
                                <input type="text" class="form-control" id="type" name="type" placeholder="種別">
                            </div>

                        </div>

                    </div>

                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">本を登録</button>
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
    let image = document.getElementById("fileItem").files[0];
@stop
