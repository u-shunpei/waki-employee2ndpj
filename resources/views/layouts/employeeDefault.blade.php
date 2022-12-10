<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="width: 100%; height: 100vh">
<header class="navbar navbar-expand-xl navbar-light mb-3 shadow" style="background-color: #7bc890">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="{{ route('showEmployeeList') }}">株式会社ワキプリントピア</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarBasic"
                aria-controls="navbarBasic" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse show" id="navbarBasic" style="">
            <ul class="navbar-nav me-auto mb-2 mb-xl-0">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="{{ route('showEmployeeList') }}">社員名簿</a>
                </li>
                @if(\Illuminate\Support\Facades\Auth::user()->kind_id === 1)
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="{{ route('showUserList') }}">ユーザ管理</a>
                    </li>
                @endif
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn secondary dropdown-toggle text-white" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            {{ $auth->name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item"
                                   href="{{route('showEmployeeEdit', \Illuminate\Support\Facades\Auth::id())}}"><span>自分のプロフィールへ</span></a>
                            </li>
                            <li>
                                <div class='userAction_logout userAction_common'>
                                    <a href="{{ route('logout') }}" class="dropdown-item"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span>ログアウト</span></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <form action="{{ route('employeeSearch') }}" method="post" class="d-flex w-25" style="height: 40px">
                @csrf
                <input type="text" name="name" class="form-control input-group-prepend rounded-0" placeholder="Name">
                <button type="submit" id="btn-search" class="btn text-white bg-success rounded-0 text-nowrap">検索</button>
            </form>
        </div>
    </div>
</header>

@yield('content')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
