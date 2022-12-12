@extends('layouts.ownerDefault')

@section('content')
    <div class="container">
        <form action="{{ route('userSearch') }}" method="post" class="input-group w-25 float-end">
            @csrf
            <select name="gender_id" class="form-control">
                <option value="" selected>Gender</option>
                @foreach($genders as $gender)
                    <option value="{{ $gender->id }}">
                        {{ $gender->name }}
                    </option>
                @endforeach
            </select>
            <input type="text" name="name" class="form-control input-group-prepend" placeholder="User Name">
            <span class="input-group-btn input-group-append">
                <button type="submit" id="btn-search" class="btn text-white rounded-0"
                        style="background-color: #7bc890">検索</button>
            </span>
        </form>
        {{--        {{ $users->links() }}--}}
        <table class="table m-auto">
            <tr>
                <th>ID</th>
                <td>name</td>
                <td>email</td>
                <td>kind</td>
                <td>
                    <span>age</span>
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                    </button>
                    <form action="{{ route('showUserList') }}" method="get" class="dropdown">
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li>
                                <button type="submit" name="sort" value="" class="bg-white border-0">元に戻す</button>
                            </li>
                            <li>
                                <button type="submit" name="sort" value="asc" class="bg-white border-0">昇順</button>
                            </li>
                            <li>
                                <button type="submit" name="sort" value="desc" class="bg-white border-0">降順</button>
                            </li>
                        </ul>
                    </form>
                </td>
                <td>detail</td>
                <td></td>
            </tr>
            @foreach($users as $user)
                <tr>
                    <th class="align-middle">{{ $user->id }}</th>
                    <td class="align-middle">{{ $user->name }}</td>
                    <td class="align-middle">{{ $user->email }}</td>
                    <td class="align-middle">{{ $user->kind->name }}</td>
                    <td class="align-middle">{{ \Illuminate\Support\Carbon::parse($user->birthday)->age }}</td>
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
        <button class="btn border text-white mt-3" style="background-color: #7bc890">
            <a href="{{ route('showUserCreate') }}" class="text-white text-decoration-none">登録</a>
        </button>
    </div>
@endsection
<script src="{{ asset('js/delete.js') }}"></script>
