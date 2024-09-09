@extends('adminlte::page')

@section('title', 'メモを書く')

@section('content_header')

@stop

@section('content')

    <div class="container mx-auto p-4 w-full h-full bg-gradient-to-r from-teal-300 to-blue-300 rounded-md shadow">
        <div class="bg-white shadow-md rounded py-2  pl-4  pr-3 w-full h-full ">
            <form action="{{ route('note.add', $book->id) }}" method="POST" class="">
                <div class="flex justify-between">
                    <div class="text-title text-center text-3xl my-6 font-extrabold">{{ $book->title }}</div>

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
                <div class="w-full ">
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
                        class="bg-blue-500 hover:bg-blue-700 my-2 mx-auto block text-white font-bold py-2 px-4 rounded focus:outline-double focus:shadow-outline animation">
                        メモを保存
                    </button>
                </div>


            </form>

        </div>
    </div>
    <!-- 本のノート　-->
    <div class="w-full">
        <table class='w-full border-gray-300 table-fixed h-full table-striped'>
            <thead>
                <tr class="border-b border-gray-300">
                    <th class="w-6/12 text-center py-2 px-4">メモ</th>
                    <th class="w-4/12 py-2 px-4">ページ</th>
                    <th class="w-1/12 py-2 px-4"></th>
                    <th class="w-1/12 py-2 px-4"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($notes as $note)
                    <tr class="text-lg bg-white border-b border-gray-200 md:h-16 xl:h-24 2xl:h-[5rem] 3xl:h-28">
                        <td class="py-2 px-4 2xl:text-3xl">{{ $note->content }}</td>
                        <td class="py-2 px-4 2xl:text-3xl">{{ $note->page_number }}</td>
                        <td class="text-white cursor-pointer"><a
                                class="hover:text-white text-lg font-semibold shadow-md hover:shadow-none py-1 px-4 bg-green-500 hover:bg-green-600 rounded-md animation">編集</a>
                        </td>
                        <td class="text-white">
                            <form action="{{ route('note.destroy', $note->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="py-1 px-4 shadow-md hover:shadow-none bg-rose-400 hover:bg-rose-600 font-semibold text-lg cursor-pointer rounded-md animation">削除</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white">
                        <td colspan="2" class="text-center py-2 px-4 border border-gray-200">メモがありません。</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mx-auto 2xl:mt-10 ">
            {{ $notes->onEachSide(2)->links('vendor.pagination.tailwind2') }}
        </div>

    </div>
@stop




@section('css')
    @vite(['resources/css/home.css'])
@stop

@section('js')
    <script></script>
@stop
