@extends('layouts.ownerDefault')

@section('content')
    <div class="w-75 m-auto">
        <h1 class="h2 align-content-start w-25">ユーザ詳細</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $user->id }}</td>
        </tr>
        <tr>
            <th>name</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>email</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>kind</th>
            <td>{{ $user->kind->name }}</td>
        </tr>
        <tr>
            <th>birthday</th>
            @if(!is_null($user->birth_id))
                <td>{{ $user->birth->name }}月{{ $user->birthday->name }}日</td>
            @else
                <td></td>
            @endif
        </tr>
        <tr>
            <th>position</th>
            @if(!is_null($user->position_id))
                <td>{{ $user->position->name }}</td>
            @else
                <td></td>
            @endif
        </tr>
        <tr>
            <th>department</th>
            @if(!is_null($user->department_id))
                <td>{{ $user->department->name }}</td>
            @else
                <td></td>
            @endif

        </tr>
        <tr>
            <th>division</th>
            @if(!is_null($user->division_id))
                <td>{{ $user->division->name }}</td>
            @else
                <td></td>
            @endif
        </tr>
    </table>
    <button class="btn border bg-primary">
        <a href="{{ route('showUserEdit', $user->id) }}" class="text-white text-decoration-none">編集</a>
    </button>
        <button class="btn border bg-white">
            <a href="{{ route('showUserList') }}" class="text-black text-decoration-none">戻る</a>
        </button>
    </div>
@endsection
