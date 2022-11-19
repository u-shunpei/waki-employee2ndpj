@extends('layouts.layout')

@section('content')
    <header class="navbar navbar-expand-xl navbar-light bg-light mb-3 shadow">
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
                <form action="/" method="post" class="d-flex">
                    @csrf
                    <input class="form-control me-2" type="search" name="name" placeholder="Search"
                           aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </header>
    <article class="d-flex">
        <div class="side w-25 bg-light shadow">
            <div class="d-flex flex-row " style="height: calc(100% - 50px)">
                <nav>
                    <form action="/" method="post">
                        @csrf
                        <input class="form-control me-2" type="hidden" name="name" placeholder="Search"
                               aria-label="Search">
                        <button class="btn" type="submit">ALL</button>
                    </form>
                    <div class="dropdown">
                        <button class="btn secondary dropdown-toggle" type="submit" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            生産調達本部
                        </button>
                        <ul class="dropdown-menu b-2" aria-labelledby="dropdownMenu2">
                            <li>
                                <form action="/" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <input type="hidden" name="division_id" value="2">
                                        生産一課
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form action="/" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <input type="hidden" name="division_id" value="3">
                                        生産二課
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form action="/" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <input type="hidden" name="division_id" value="4">
                                        生産三課
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button class="btn secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            マーケティング本部
                        </button>
                        <ul class="dropdown-menu b-2" aria-labelledby="dropdownMenu2">
                            <li>
                                <form action="/" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <input type="hidden" name="division_id" value="5">
                                        BPO事業企画課
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form action="/" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <input type="hidden" name="division_id" value="6">
                                        直販課
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form action="/" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <input type="hidden" name="division_id" value="7">
                                        システム企画課
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button class="btn secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            新規事業開発部
                        </button>
                        <ul class="dropdown-menu b-2" aria-labelledby="dropdownMenu2">
                            <li>
                                <form action="/" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <input type="hidden" name="division_id" value="8">
                                        事業開発室
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form action="/" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <input type="hidden" name="division_id" value="9">
                                        デザイン室
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button class="btn secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            企画本部
                        </button>
                        <ul class="dropdown-menu b-2" aria-labelledby="dropdownMenu2">
                            <li>
                                <form action="/" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <input type="hidden" name="division_id" value="10"/>
                                        IT課
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form action="/" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <input type="hidden" name="division_id" value="11">
                                        経営企画課
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="list w-25 bg-light shadow">
            @foreach($users as $user)
                <a href="{{route('showDetail', $user->id)}}" class="card text-decoration-none text-black">
                    <div class="d-flex">
                        <div class="img">
                            <img src="{{ '\storage\images\ ' . $user->img_name }}" alt="...">
                        </div>
                        <div class="content">
                            <span>{{ $user->nickname }}</span><br>
                            <span>{{ $user->name }}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="detail w-50 bg-white container shadow">
            <div class="d-flex justify-content-start mb-3">
                <div class="mt-4 w-50">
                    <div class="tab">
{{--                        <ul class="tab-menu">--}}
{{--                            <li class="tab-menu__item active">--}}
{{--                                <img src="{{ '\storage\images\ ' . $person->img_name }}" alt="">--}}
{{--                                --}}{{--                            <img src="/storage/images/{{$user -> img_name}}">--}}
{{--                            </li>--}}
{{--                            <li class="tab-menu__item">--}}
{{--                                <img src="{{ '\storage\images\ ' . $person->img_name }}" alt="">--}}
{{--                                --}}{{--                            <img src="/storage/images/{{$user -> img_name}}">--}}
{{--                            </li>--}}
{{--                            <li class="tab-menu__item">--}}
{{--                                <img src="{{ '\storage\images\ ' . $person->img_name }}" alt="">--}}
{{--                                --}}{{--                            <img src="/storage/images/{{$user -> img_name}}">--}}
{{--                            </li>--}}
{{--                        </ul>--}}
                        <div class="tab-content">
                            <div class="tab-content__item show">
                                <img src="{{ '\storage\images\ ' . $person->img_name }}" alt="">
                                {{--                            <img src="/storage/images/{{$user -> img_name}}">--}}
                            </div>
                            <div class="tab-content__item">
                                <img src="{{ '\storage\images\ ' . $person->img_name2 }}" alt="">
                                {{--                            <img src="/storage/images/{{$user -> img_name}}">--}}
                            </div>
                            <div class="tab-content__item">
                                <img src="{{ '\storage\images\ ' . $person->img_name }}" alt="">
                                {{--                            <img src="/storage/images/{{$user -> img_name}}">--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <table class="table table-striped">
                        <tr>
                            <th>名前</th>
                            <td>{{ $person->name }}</td>
                        </tr>
                        <tr>
                            <th>愛称</th>
                            <td>{{ $person->nickname }}</td>
                        </tr>
                        <tr>
                            <th>誕生日</th>
                            @if(is_null($person->birth_id))
                                <td></td>
                            @else
                                <td>{{ $user->birth->name }}月{{ $person->birthday->name }}日</td>
                            @endif
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="">
                    <table class="table table-striped">
                        <tr>
                            <th>自己紹介</th>
                            <td>{{ $person->self_introduction }}</td>
                        </tr>
                        <tr>
                            <th>役職</th>
                            @if(is_null($person->position_id))
                                <td></td>
                            @else
                                <td>{{ $person->position->name }}</td>
                            @endif
                        </tr>
                        <tr>
                            <th>部署</th>
                            @if(is_null($person->department_id))
                                <td></td>
                            @else
                                <td>{{ $person->department->name }}</td>
                            @endif
                        </tr>
                        <tr>
                            <th>課</th>
                            @if(is_null($person->division_id))
                                <td></td>
                            @else
                                <td>{{ $person->division->name }}</td>
                            @endif
                        </tr>
                        <tr>
                            <th>やりたい仕事（ワキに限らず）</th>
                            <td>{{ $person->work }}</td>
                        </tr>
                        <tr>
                            <th>持っている資格、技術</th>
                            <td>{{ $person->skill }}</td>
                        </tr>
                        <tr>
                            <th>趣味</th>
                            <td>{{ $person->hobby }}</td>
                        </tr>
                        <tr>
                            <th>目標、夢</th>
                            <td>{{ $person->target }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </article>
@endsection
