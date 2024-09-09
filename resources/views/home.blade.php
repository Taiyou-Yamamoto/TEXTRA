@extends('adminlte::page')

@section('title', 'Home')


@section('content')
    <div
        class="mx-auto h-32 bg-gradient-to-r from-teal-300 to-blue-300 rounded-xl mt-3 flex flex-col justify-center shadow-md">
        <div class="bg-white">
            <div class="flex items-center px-2 pt-2  m-1">
                <h1 class="text-3xl font-bold ml-4">Tips</h1>
                <i class="fas fa-lightbulb text-lg" style="color: #FFD43B;"></i>
            </div>
            <h1 class="font-semibold text-lg text-center mb-[2rem]">{{ $randomComment }}</h1>
        </div>

    </div>

    <div
        class="p-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-5 gap-6 w-full h-[7rem] 2xl:h-[50rem] xl:h-[50rem] lg:h-80 mmd:h-[40rem] sm:h-[15rem]">
        <!-- 本を追加するボタン -->
        <div class="flex items-center justify-center">
            <a href="{{ route('book.register') }}" class="flex flex-col items-center justify-center h-full w-full ">
                <div
                    class="flex flex-col items-center justify-center h-full w-full rounded-md border-4 border-dashed hover:bg-blue-300 border-blue-600 hover:border-indigo-600 quickAnimation hover:bg-blue-30">
                    <i class="fas fa-plus text-4xl text-blue-600 hover:text-indigo-600 animation"></i>
                </div>
                <p class="w-full font-semibold text-2xl mt-1 text-center hover:text-blue-700 animation">
                    本を追加する
                </p>
            </a>
        </div>

        <!-- 本のカード -->
        @foreach ($books as $book)
            <div class="flex items-center justify-center aspect-lon">
                <a href="{{ route('note.register', $book->id) }}" method="GET"
                    class="flex flex-col items-center justify-center h-full w-full">
                    <div
                        class="rounded-xl h-full w-full hover:border-4 hover:border-blue-500 hover:text-blue-600 shadow-md hover:shadow-2xl active:shadow-none quickAnimation">
                        <img src="{{ asset($book->image_path ?? 'img/bookimage.jpg') }}" alt="img"
                            class="h-full w-full object-cover rounded-lg">
                    </div>
                    <p
                        class="w-full text-2xl font-semibold mt-1 text-center text-ellipsis overflow-hidden whitespace-nowrap">
                        {{ $book->title }}
                    </p>
                </a>
            </div>
        @endforeach
    </div>


    </div>



@stop

@section('css')
    @vite(['resources/css/home.css'])
@stop

@section('js')
    <script></script>
@stop
