@extends('adminlte::page')

@section('title', 'メモを書く')

@section('content_header')

@stop

@section('content')
    <x-guest-layout>
        こんにちは
    </x-guest-layout>

@stop




@section('css')
    @vite(['resources/css/home.css'])
@stop

@section('js')
    <script></script>
@stop
