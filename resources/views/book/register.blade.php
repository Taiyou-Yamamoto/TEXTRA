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
                    <div class="card-body flex h-80">
                        <div class="w-80 pt-3">
                            <img src="{{ asset('img/D4123631-D9E9-44CE-B6BC-CD30034EABCC_1_201_a.jpeg') }}" alt="本のイメージ"
                                class="h-4/5 w-3/6 rounded-md mx-auto">
                            <input type="file" name="img_path" class="mt-6" />
                        </div>

                        <div class="flex-grow-1 mx-4 my-10">
                            <div class="form-group">
                                <label for="name">タイトル</label>
                                <input type="text" class="form-control" id="name" name="name"
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
@stop
