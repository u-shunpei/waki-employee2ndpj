@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="w-100">
            <header class="navbar navbar-expand-xl navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">株式会社ワキプリントピア</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarBasic"
                            aria-controls="navbarBasic" aria-expanded="true" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse collapse show" id="navbarBasic" style="">
                        <ul class="navbar-nav me-auto mb-2 mb-xl-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
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
                        <form action="/home" method="post" class="d-flex">
                            @csrf
                            <input class="form-control me-2" type="search" name="name" placeholder="Search"
                                   aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </header>
        </div>
        <div class="col-2">
            <div class="d-flex flex-row w-100" style="height: calc(100% - 50px)">
                <nav class="bg-light">
                    <form action="/home" method="post">
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
                                <form action="/home" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <input type="hidden" name="division_id" value="2">
                                        生産一課
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form action="/home" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <input type="hidden" name="division_id" value="3">
                                        生産二課
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form action="/home" method="post">
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
                                <form action="/home" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <input type="hidden" name="division_id" value="5">
                                        BPO事業企画課
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form action="/home" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <input type="hidden" name="division_id" value="6">
                                        直販課
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form action="/home" method="post">
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
                                <form action="/home" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <input type="hidden" name="division_id" value="8">
                                        事業開発室
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form action="/home" method="post">
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
                                <form action="/home" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <input type="hidden" name="division_id" value="10"/>
                                        IT課
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form action="/home" method="post">
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
        <div class="col-10">
            <div class="flex__card">
                @foreach($users as $user)
                    <div class="card">
                        <a href="{{ route('showDetail', $user->id) }}" style="text-decoration: none">
                            <div class="card__img">
                                <img src="{{ '\storage\images\ ' . $user->img_name }}" alt="">
                                {{--                        <img src="/storage/images/{{$user->img_name}}" alt="">--}}
                            </div>
                            <div class="card__content">
                                <div class="card__content-cat">{{ $user->name }}</div>
                                <h2 class="card__content-ttl">{{ $user->self_introduction }}</h2>
                                <div class="card__content-tag">
                                    <p class="card__content-tag-item">#朝ごはん</p>
                                    <p class="card__content-tag-item card__content-tag-item--last">2021/01/01</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            {{ $users->links() }}
        </div>
    </div>


@endsection

