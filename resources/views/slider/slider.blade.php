@extends('adminlte::page')

@section('title', 'メモを書く')

@section('content_header')

@stop

@section('content')
    <div class="swiper w-full  mx-auto mt-12 relative">
        <div class="parallax-bg" style="background-image: url('https://swiperjs.com/demos/images/nature-1.jpg');" data-swiper-parallax="-23%"></div>
        
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper flex items-center">
            @forelse ($notes as $note)
                <!-- Slides -->
                <div class="font-semibold swiper-slide slide-content w-full text-xl leading-normal rounded-md border">{{ $note->content }}</div>
            @empty
                <div class="swiper-slide flex items-center justify-center">めもがありません</div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination absolute bottom-10 left-1/2 transform -translate-x-1/2"></div>

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
