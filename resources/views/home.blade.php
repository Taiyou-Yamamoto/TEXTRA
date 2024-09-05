@extends('adminlte::page')

@section('title', 'Home')

@section('content')

    <div class="p-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 h-auto">
        <!-- 本を追加するボタン -->
        <div>
            <a href="{{ route('book.register') }}" method="GET">
                <div
                    class="flex flex-col items-center justify-center rounded-md border-4 border-dashed h-80 w-full
                border-blue-600 hover:border-indigo-600 transition-all duration-200 hover:bg-blue-300 xl:w-/6">
                    <i class="fas fa-plus text-4xl text-blue-600 hover:text-indigo-600 transition-all duration-200"></i>

                </div>
                <p class="font-semibold text-2xl mt-1 text-center hover:text-blue-700 transition-all duration-200">
                    本を追加する
                </p>
            </a>

        </div>


        <!-- 本のカード -->
        @foreach ($books as $book)
            <a href="{{ route('note.register', $book->id) }}" method="GET"
                class="hover:text-blue-600 transition-all duration-200">
                <div
                    class="rounded-md bg-white shadow-md overflow-hidden h-80 w-full hover:shadow-xl transition-shadow duration-200">
                    <img src="{{ asset($book->img_path ?? 'img/bookimage.jpg') }}" alt="img"
                        class="w-full object-contain">
                </div>
                <p class="text-2xl font-semibold mt-1 text-center overflow-hidden text-ellipsis whitespace-nowrap">
                    {{ $book->title }}
                </p>
            </a>
        @endforeach
    </div>

@stop

@section('css')
    @vite(['resources/css/home.css'])
@stop

@section('js')
    <script></script>
@stop
