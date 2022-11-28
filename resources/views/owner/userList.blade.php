@extends('layouts.ownerDefault')

@section('content')
    <div class="w-75 m-auto">
        <h1 class="h2 align-content-start w-25">ユーザ一覧</h1>
        {{ $users->links() }}
        <table class="table m-auto">
            <tr>
                <th>ID</th>
                <td>name</td>
                <td>email</td>
                <td>kind</td>
                <td></td>
                <td></td>
            </tr>
            @foreach($users as $user)
                <tr>
                    <th class="align-middle">{{ $user->id }}</th>
                    <td class="align-middle">{{ $user->name }}</td>
                    <td class="align-middle">{{ $user->email }}</td>
                    <td class="align-middle">{{ $user->kind->name }}</td>
                    <td>
                        <button class="btn border">
                            <a href="{{ route('showUserDetail', $user->id) }}"
                               class="text-black text-decoration-none">詳細</a>
                        </button>
                    </td>
                    <td>
                        <form action="{{ route('userDelete', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn bg-danger" onClick="delete_alert(event);return false;">
                                <span class="text-white">削除</span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <button class="btn border bg-primary">
            <a href="{{ route('showUserCreate') }}" class="text-white text-decoration-none">登録</a>
        </button>
    </div>
@endsection
<script src="{{ asset('js/delete.js') }}"></script>
