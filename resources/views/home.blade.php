@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')

@stop

@section('content')
    <div class=" p-4 rounded-md grid grid-cols-5 ">
        <form action="{{ url('/book/register') }}" method="get"
            class="items-center flex flex-col  justify-center place-items-center border-4 border-dashed  border-blue-700 h-72 cursor-pointer hover:text-indigo-400 hover:border-indigo-400 transition-all duration-100">
            <i class="fas fa-plus text-3xl mr-4 text-blue-600 mx-auto transition-all duration-100"></i>
            <p class="text-shadow text-blue-600 text-2xl  hover:text-indigo-400 mx-auto transition-all duration-100">本を追加する
            </p>
        </form>

        {{-- @foreach
        @endforeach --}}
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="{{ mix('css/home.css') }}"> --}}
    @vite(['resources/css/home.css'])
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
