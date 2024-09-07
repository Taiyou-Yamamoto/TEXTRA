@extends('adminlte::page')

@section('title', 'メモを書く')

@section('content_header')

@stop

@section('content')

    <div class="container mx-auto p-4 w-full h-full">
        <div class="bg-white shadow-md rounded p-6 w-full h-full">
            <form action="{{ route('note.add', $book->id) }}" method="POST" class="">
                <div class="flex justify-between">
                    <div class="text-center text-3xl my-6 font-extrabold">{{ $book->title }}</div>

                    {{-- ページ番号 --}}
                    <div class=" mb-4 flex flex-col">
                        <label for="page_number" class="block text-center text-lg font-medium">ページ番号</label>
                        <input type="number" name="page_number" id="page_number" value="{{ old('page_number') }}"
                            class="w-20 h-15 p-2 text-xl mx-auto shadow-md border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('page_number')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                @csrf
                <!-- メモ入力フィールド -->
                <div class="w-full">
                    <textarea name="note" id="note" rows="6"
                        class=" w-full shadow-md border rounded py-2 px-3 text-2xl text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        {{-- placeholder="本に関するメモを入力してください">{{ old('note', $book->note) }}</textarea> --}} placeholder="本に関するメモを入力してください"></textarea>

                    @error('note')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- 保存ボタン -->
                <div class="">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 mt-2 mx-auto block text-white font-bold py-2 px-4 rounded focus:outline-double focus:shadow-outline transition-all duration-300">
                        メモを保存
                    </button>
                </div>
            </form>
        </div>
    </div>

@stop




@section('css')
    @vite(['resources/css/home.css'])
@stop

@section('js')
    <script></script>
@stop
