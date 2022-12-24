@extends('layouts.ownerDefault')

@section('content')
    <div class="w-75 m-auto">
        <h2>ユーザ登録完了</h2>
        <p>ユーザ情報の登録が完了しました。</p>
        <a href="{{ route('showEmployeeList') }}" class="text-decoration-none">社員名簿へ進む</a>
    </div>
@endsection
