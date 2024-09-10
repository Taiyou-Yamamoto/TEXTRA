@extends('adminlte::page')

@section('title', 'メモを書く')

@section('content_header')

@stop

@section('content')
    <!-- 本のノート　-->
    <h1 class="text-center p-9 text-6xl font-extrabold gray_shadow gradient-underline gradient-underline::after">MEMO一覧</h1>
    <div class="w-full">
        <table class='w-full border-gray-300 table-fixed h-full table-striped  shadow'>
            <thead>
                <tr class="border-b border-gray-300">
                    <th class="w-8/12 text-center py-2 px-4 text-2xl">メモ</th>
                    <th class="w-2/12 py-2 px-4 text-2xl">ページ</th>
                    <th class="w-1/12 py-2 px-4"></th>
                    <th class="w-1/12 py-2 px-4"></th>
                    <th class="w-1/12 py-2 px-4"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($notes as $note)
                    <tr class="text-lg bg-white border-b border-gray-200 md:h-16 xl:h-24 2xl:h-[5rem] 3xl:h-20">
                        <td class="py-2 px-4 2xl:text-3xl text-ellipsis overflow-hidden whitespace-nowrap">
                            {{ $note->content }}</td>
                        <td class="py-2 px-4 2xl:text-3xl">{{ $note->page_number }}</td>
                        <td class="text-white cursor-pointer"><a href="{{ route('note.edit') }}"
                                class="hover:text-white text-lg font-semibold shadow-md hover:shadow-none py-1 px-4 bg-green-500 hover:bg-green-600 rounded-md animation">編集</a>
                        </td>
                        <td class="text-white cursor-pointer"><button type="button" class="btn "
                                data-toggle="modal" data-target="#exampleModal">
                                モーダルを開く
                            </button>

                        </td>

                        <td class="text-white">
                            <form action="{{ route('allNote.destroy', $note->id) }}" method="POST">
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

        <!-- モーダルの本体 -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">モーダルタイトル</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        モーダルの内容がここに入ります。
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                        <button type="button" class="btn btn-primary">保存</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop

@section('css')
    @vite(['resources/css/home.css'])
@stop

@section('js')
    <script></script>
@stop
