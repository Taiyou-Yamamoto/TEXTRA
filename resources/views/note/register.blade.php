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
                        placeholder="本に関するメモを入力してください"></textarea>

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
        <table class='w-full border-gray-300 table-fixed h-full table-striped  shadow'>
            <thead>
                <tr class="border-b border-gray-300">
                    <th class="hidden">id</th>
                    <th class="hidden">タイトル</th>
                    <th class="w-8/12 text-center py-2 text-2xl">メモ</th>
                    <th class="w-1/12 text-center">ページ</th>
                    <th class="w-1/12 text-center">種類</th>
                    <th class="w-1/12 py-2 px-4"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($notes as $note)
                    {{-- タイトル --}}
                    <tr class="text-lg bg-white border-b border-gray-200 md:h-16 xl:h-24 2xl:h-[5rem] 3xl:h-20">
                        <td class="hidden">
                            {{ $note->book->title }}</td>

                        {{-- メモ内容 --}}
                        <td class="py-2 px-4 2xl:text-ms text-ellipsis overflow-hidden whitespace-nowrap">
                            {{ $note->content }}</td>

                        {{-- ページ番号 --}}
                        <td class="py-2 px-4 2xl:text-2xl text-center">{{ $note->page_number }}</td>

                        {{-- 種類 --}}
                        <td class="py-2 px-4 2xl:text-xl text-center text-ellipsis overflow-hidden whitespace-nowrap">
                            {{ $note->book->type }}</td>

                        {{-- 編集ボタン --}}
                        <td class="text-white cursor-pointer"><button id="{{ $loop->index }}" type="button"
                                class="btn gray_shadow text-white text-lg font-semibold shadow-md hover:shadow-none py-1 px-4 bg-green-500 hover:bg-green-600 rounded-md animation"
                                data-toggle="modal" data-target="#exampleModal" data_id="{{ $note->id }}"
                                data_title="{{ $note->book->title }}" data_type="{{ $note->book->type }}"
                                data_page_number="{{ $note->page_number }}" data_book_id="{{ $note->book_id }}"
                                data_content="{{ $note->content }}" onclick="openEditModal(this)"><i
                                    class="fas fa-pencil-alt gray_shadow"></i>
                                編集
                            </button>

                        </td>
                        {{-- 削除ボタン --}}
                        <td class="text-white">
                            <form action="{{ route('allNote.destroy', $note->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="py-1 px-4 shadow-md hover:shadow-none gray_shadow bg-rose-400 hover:bg-rose-600 font-semibold text-lg cursor-pointer rounded-md animation"><i
                                        class="fas fa-trash gray_shadow"></i> 削除</button>
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
    {{-- モーダル  --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered w-11/12 max-w-5xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>

                </div>

                {{-- 入力フォーム --}}
                <form id="editForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body h-96 mb-3">
                        <input type="hidden" id="modal_id" name="id">
                        <input type="hidden" id="modal_book_i" name="book_id">
                        <div class="grid grid-custom gap-4">
                            {{-- モーダルタイトル --}}
                            <div class="mb-4 flex flex-col">
                                <label for="modal_title"
                                    class="gray_shadow block text-center text-lg font-medium">本のタイトル</label>
                                <input type="text" name="title" id="modal_title" value="{{ old('title') }}"
                                    class="w-full h-15 p-2 text-xl mx-auto shadow-md border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @error('title')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- フォームのコンテナ --}}
                            <div class="grid child-grid-custom  gap-4">

                                {{-- 種類 --}}
                                <div class="mb-4 flex flex-col">
                                    <label for="modal_type"
                                        class="gray_shadow block text-center text-lg font-medium">種類</label>
                                    <input type="text" name="type" id="modal_type" value="{{ old('type') }}"
                                        class="w-full h-15 p-2 text-xl mx-auto shadow-md border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    @error('type')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- ページ番号 --}}
                                <div class="mb-4 flex flex-col">
                                    <label for="modal_page_number"
                                        class="gray_shadow block text-center text-lg font-medium">ページ番号</label>
                                    <input type="number" name="page_number" id="modal_page_number"
                                        value="{{ old('page_number') }}"
                                        class="w-full h-15 p-2 text-xl mx-auto shadow-md border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    @error('page_number')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        {{-- メモ内容 --}}
                        <textarea name="content" id="modal_content" cols="30" rows="6"
                            class="w-full shadow border-teal-300 text-xl rounded-md leading-10"></textarea>
                    </div>
                    <div class="modal-footer flex flex-row">

                        <button type="submit" class="btn btn-primary font-bold w-1/6 mr-[20rem]">保存</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@stop

@section('css')
    @vite(['resources/css/home.css'])
@stop

@section('js')
    <script>
        let openEditModal = function(button) {
            let data_id = button.getAttribute('data_id');
            let data_title = button.getAttribute('data_title');
            let data_content = button.getAttribute('data_content');
            let data_type = button.getAttribute('data_type');
            let data_page_number = button.getAttribute('data_page_number');



            document.getElementById('modal_id').value = data_id;
            document.getElementById('modal_title').value = data_title;
            document.getElementById('modal_type').value = data_type;
            document.getElementById('modal_page_number').value = data_page_number;
            document.getElementById('modal_content').value = data_content;
            // document.getElementById('modal_book_id').value = data_book_id;

            // url変更
            document.getElementById('editForm').action = `/note/edit/${data_id}`;
        }
    </script>
@stop
