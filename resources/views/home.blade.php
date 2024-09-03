@extends('adminlte::page')

@section('title', 'Home')

{{-- @section('content_header')

@stop --}}

@section('content')


    <div class=" p-4 grid grid-cols-5 ">
        <a href="{{ route('book.register') }}" method="GET"
            class="items-center flex flex-col rounded-md justify-center place-items-center border-4 border-dashed  border-blue-700 h-72 cursor-pointer hover:text-indigo-400 hover:border-indigo-400 transition-all duration-100">
            <i class="fas fa-plus text-3xl mr-4 text-blue-600 mx-auto transition-all duration-100"></i>
            <p class="text-shadow text-blue-600 text-2xl  hover:text-indigo-400 mx-auto transition-all duration-100">本を追加する
            </p>
        </a>

        @foreach ($books as $book)
            <a href="{{ route('book.register') }}" method="GET">
                <div href="{{ route('book.register') }}" method="GET"
                    class="items-center rounded-md place-items-center border-4 ml-6 w-52 h-64">
                    <img src="{{ asset('img/D4123631-D9E9-44CE-B6BC-CD30034EABCC_1_201_a.jpeg') }}" alt="img"
                        class=" rounded-md">
                </div>
                <p>{{ $book->title }}</p>
            </a>
        @endforeach
    </div>
    <button></button>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="{{ mix('css/home.css') }}"> --}}
    @vite(['resources/css/home.css'])
@stop

@section('js')
    <script></script>
@stop
