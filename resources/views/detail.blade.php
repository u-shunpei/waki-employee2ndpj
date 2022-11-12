@extends('layouts.layout')

@section('content')
    <header class="navbar navbar-expand-xl navbar-light bg-light mb-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="http://127.0.0.1:8000/home">株式会社ワキプリントピア</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarBasic"
                    aria-controls="navbarBasic" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse show" id="navbarBasic" style="">
                <ul class="navbar-nav me-auto mb-2 mb-xl-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="http://127.0.0.1:8000/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $auth->name }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item"
                                       href="{{route('users.show', ['id' => auth()->user()->id])}}"><span>自分のプロフィールへ</span></a>
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
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="tab">
                    <ul class="tab-menu">
                        <li class="tab-menu__item active">
                                                <img src="{{ '\storage\images\ ' . $user->img_name }}" alt="">
{{--                            <img src="/storage/images/{{$user -> img_name}}">--}}
                        </li>
                        <li class="tab-menu__item">
                                                <img src="{{ '\storage\images\ ' . $user->img_name }}" alt="">
{{--                            <img src="/storage/images/{{$user -> img_name}}">--}}
                        </li>
                        <li class="tab-menu__item">
                                                <img src="{{ '\storage\images\ ' . $user->img_name }}" alt="">
{{--                            <img src="/storage/images/{{$user -> img_name}}">--}}
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-content__item show">
                                                <img src="{{ '\storage\images\ ' . $user->img_name }}" alt="">
{{--                            <img src="/storage/images/{{$user -> img_name}}">--}}
                        </div>
                        <div class="tab-content__item">
                                                <img src="{{ '\storage\images\ ' . $user->img_name2 }}" alt="">
{{--                            <img src="/storage/images/{{$user -> img_name}}">--}}
                        </div>
                        <div class="tab-content__item">
                                                <img src="{{ '\storage\images\ ' . $user->img_name }}" alt="">
{{--                            <img src="/storage/images/{{$user -> img_name}}">--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <table class="table table-striped">
                    <tr>
                        <th>名前</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>愛称</th>
                        <td>{{ $user->nickname }}</td>
                    </tr>
                    <tr>
                        <th>誕生日</th>
                        @if(is_null($user->birth_id))
                            <td></td>
                        @else
                            <td>{{ $user->birth->name }}月{{ $user->birthday->name }}日</td>
                        @endif
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <table class="table table-striped">
                    <tr>
                        <th>自己紹介</th>
                        <td>{{ $user->self_introduction }}</td>
                    </tr>
                    <tr>
                        <th>役職</th>
                        @if(is_null($user->position_id))
                            <td></td>
                        @else
                            <td>{{ $user->position->name }}</td>
                        @endif
                    </tr>
                    <tr>
                        <th>部署</th>
                        @if(is_null($user->department_id))
                            <td></td>
                        @else
                            <td>{{ $user->department->name }}</td>
                        @endif
                    </tr>
                    <tr>
                        <th>課</th>
                        @if(is_null($user->division_id))
                            <td></td>
                        @else
                            <td>{{ $user->division->name }}</td>
                        @endif
                    </tr>
                    <tr>
                        <th>やりたい仕事（ワキに限らず）</th>
                        <td>{{ $user->work }}</td>
                    </tr>
                    <tr>
                        <th>持っている資格、技術</th>
                        <td>{{ $user->skill }}</td>
                    </tr>
                    <tr>
                        <th>趣味</th>
                        <td>{{ $user->hobby }}</td>
                    </tr>
                    <tr>
                        <th>目標、夢</th>
                        <td>{{ $user->target }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection
