@extends('adminlte::page')

@section('title', 'Home')

@section('content')
    <div
        class="mx-auto h-32 bg-gradient-to-r from-teal-300 to-blue-300 rounded-xl mt-3 flex flex-col justify-center shadow-md">
        <div class="bg-white">
            <div class="flex items-center px-2 pt-2 m-1">
                <h1 class="text-3xl font-bold ml-4">Tips</h1>
                <i class="fas fa-lightbulb text-lg text-yellow-400"></i>
            </div>
            <h1 class="font-semibold xl:!text-2xl lg:!text-base md:!text-base text-sm text-center mb-8">{{ $randomComment }}
            </h1>
        </div>
    </div>
    {{-- 2xl:min-h-[20rem] --}}
    <div class="p-4 grid grid-cols-3 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6 w-full">
        <!-- 本を追加するボタン -->
        <div
            class="flex justify-center  min-h-[5rem] 2xl:min-h-[28rem] xl:min-h-[19rem] lg:min-h-[19rem] md:min-h-[20rem] sm:min-h-[10rem]">
            <a href="{{ route('book.register') }}" class="flex flex-col items-center justify-center h-full w-full">
                <div
                    class="flex flex-col items-center justify-center h-full w-full rounded-md border-4 border-dashed hover:bg-blue-300 border-blue-600 hover:border-indigo-600 quickAnimation">
                    <i class="fas fa-plus text-4xl text-blue-600 hover:text-indigo-600"></i>
                </div>
                <p class="w-full font-semibold xl:text-2xl lg:text-lg mt-1 text-center hover:text-blue-700">本を追加する</p>
            </a>
        </div>

        <!-- 本のカード -->
        @foreach ($books as $book)
            <div class="relative flex items-center justify-center ">
                <a href="{{ route('note.register', $book->id) }}" method="GET"
                    class="flex flex-col items-center h-full w-full">
                    <div
                        class="w-full aspect-3/5 img_shadow rounded-xl hover:border-4 hover:border-blue-500 hover:text-blue-600  hover:shadow-2xl active:shadow-none quickAnimation">
                        <img src="{{ $book->image_path == 'img/bookimage.jpg' ? asset('img/bookimage.jpg') : Storage::disk('s3')->url($book->image_path) }}"
                            alt="img" class="h-full w-full object-cover rounded-lg">
                    </div>
                    <p
                        class="w-full text-2xl font-semibold mt-1 text-center text-ellipsis overflow-hidden whitespace-nowrap lg:text-lg">
                        {{ $book->title }}</p>
                </a>
                <form action="{{ route('book.destroy', $book->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="absolute top-2 right-2 z-10 opacity-0 delete-btn hover:opacity-100 hover:cursor-pointer hover:text-gray-500">
                        <i class="fas fa-trash white_shadow text-2xl"></i>
                    </button>
                </form>
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
