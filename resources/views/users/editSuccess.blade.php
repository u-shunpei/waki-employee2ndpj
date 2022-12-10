@extends('layouts.employeeDefault')

@section('content')
    <div class="w-75 m-auto">
        <h2>プロフィール編集完了</h2>
        <p>プロフィールの編集が完了しました。</p>
        <a href="{{ route('showEmployeeList') }}" class="text-decoration-none">社員名簿へ戻る</a>
    </div>
@endsection
