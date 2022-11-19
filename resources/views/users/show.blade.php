@extends('layouts.layout')

@section('content')
    <header class="navbar navbar-expand-xl navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">株式会社ワキプリントピア</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarBasic"
                    aria-controls="navbarBasic" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse show" id="navbarBasic" style="">
                <ul class="navbar-nav me-auto mb-2 mb-xl-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class='usershowPage'>
        <div class='container'>
            <div class='userInfo'>
                <div class='userInfo_img'>
                    <img src="{{ '\storage\images\ ' . $user->img_name }}" alt="">
{{--                    <img src="/storage/images/{{$user -> img_name}}">--}}
                </div>
                <div class='userInfo_name'>{{ $user -> name }}</div>
            </div>

            <div class='userAction'>
                <div class="userAction_edit userAction_common">

                    <!-- この行を編集 -->
                    <a href="/users/edit/{{$user->id}}"><i class="fas fa-edit fa-2x"></i></a>

                    <span>情報を編集</span>

                </div>
                <div class='userAction_logout userAction_common'>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();"><i class="fas fa-cog fa-2x"></i></a>
                    <span>ログアウト</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
