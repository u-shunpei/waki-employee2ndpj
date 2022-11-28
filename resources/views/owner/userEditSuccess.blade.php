@extends('layouts.ownerDefault')

@section('content')
    <div class="w-75 m-auto">
        <h1>ユーザ編集完了</h1>
        <p>ユーザ情報の編集が完了しました。</p>
        <a href="{{ route('showUserList') }}" class="text-decoration-none">ユーザ一覧へ戻る</a>
    </div>
@endsection
