@extends('adminlte::page')

@section('title', 'メモを書く')

@section('content_header')
@stop

@section('content')
    <div class="swiper w-full mx-auto mt-12">
        <div class="swiper-wrapper flex items-center">
            @foreach ($notes as $note)
                <!-- Slides -->
                <div class="swiper-slide slide-content w-full leading-normal rounded-md border gray_shadow shadow-md">
                    <div class="flex-col">
                        <div class="mb-4 text-center text-5xl">
                            {{ $note->book->title }}
                        </div>
                        <div class="content text-xl leading-normal">
                            {{ $note->content }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination text-xl font-semibold h-10 text-white gray_shadow"></div>

        <!-- Scrollbar -->
        <div class="swiper-scrollbar"></div>

        <!-- Navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
@stop

@section('css')
    @vite(['resources/css/slider.css'])
@stop

@section('js')
    @vite(['resources/js/app.js'])
@stop
