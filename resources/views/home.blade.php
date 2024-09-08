@extends('adminlte::page')

@section('title', 'Home')


@section('content')

    <div class="p-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 h-[28rem] w-full">
        <!-- 本を追加するボタン -->
        <div class="flex items-center justify-center">
            <a href="{{ route('book.register') }}" class="flex flex-col items-center justify-center h-full w-full">
                <div
                    class="flex flex-col items-center justify-center h-full w-full rounded-md border-4 border-dashed hover:bg-blue-300  border-blue-600 hover:border-indigo-600 transition-all duration-200 hover:bg-blue-30">
                    <i class="fas fa-plus text-4xl text-blue-600 hover:text-indigo-600 transition-all duration-200"></i>
                </div>
                <p class="font-semibold text-2xl mt-1 text-center hover:text-blue-700 transition-all duration-200">
                    本を追加する
                </p>
            </a>
        </div>

        <!-- 本のカード -->
        @foreach ($books as $book)
            <div class="flex items-center justify-center">
                <a href="{{ route('note.register', $book->id) }}" method="GET"
                    class="flex flex-col items-center justify-center h-full w-full">
                    <div
                        class="rounded-xl h-full w-full hover:border-4 hover:border-blue-500 hover:text-blue-600 shadow-md hover:shadow-2xl active:shadow-none transition-all duration-200">
                        <img src="{{ asset($book->image_path ?? 'img/bookimage.jpg') }}" alt="img"
                            class="h-full w-full object-cover rounded-lg">
                    </div>
                    <p class="text-2xl font-semibold mt-1 text-center overflow-hidden text-ellipsis whitespace-nowrap">
                        {{ $book->title }}
                    </p>
                </a>
            </div>
        @endforeach
    </div>


@stop

@section('css')
    @vite(['resources/css/home.css'])
@stop

@section('js')
    <script></script>
@stop
