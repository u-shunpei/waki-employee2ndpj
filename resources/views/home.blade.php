@extends('layouts.default')

@section('content')
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
                        <span>　生産調達本部</span>
                        <button class="btn secondary dropdown-toggle" type="submit" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
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
        <div class="detail w-50 bg-white shadow">
        </div>
    </article>
@endsection

