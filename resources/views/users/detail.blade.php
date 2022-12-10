@extends('layouts.employeeDefault')

@section('content')
    <article class="d-flex">
        <div class="side w-25 bg-light shadow">
            <div class="d-flex flex-row " style="height: calc(100% - 50px)">
                <nav>
                    <form action="{{ route('employeeSearch') }}" method="post">
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
                                <form action="{{ route('employeeSearch') }}" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <input type="hidden" name="division_id" value="2">
                                        生産一課
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form action="{{ route('employeeSearch') }}" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <input type="hidden" name="division_id" value="3">
                                        生産二課
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form action="{{ route('employeeSearch') }}" method="post">
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
                                <form action="{{ route('employeeSearch') }}" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <input type="hidden" name="division_id" value="5">
                                        BPO事業企画課
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form action="{{ route('employeeSearch') }}" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <input type="hidden" name="division_id" value="6">
                                        直販課
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form action="{{ route('employeeSearch') }}" method="post">
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
                                <form action="{{ route('employeeSearch') }}" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <input type="hidden" name="division_id" value="8">
                                        事業開発室
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form action="{{ route('employeeSearch') }}" method="post">
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
                                <form action="{{ route('employeeSearch') }}" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <input type="hidden" name="division_id" value="10"/>
                                        IT課
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form action="{{ route('employeeSearch') }}" method="post">
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
        <div class="w-25 bg-light shadow">
            @foreach($users as $user)
                <a href="{{route('showEmployeeDetail', $user->id)}}"
                   class="card text-decoration-none text-black d-block rounded-0" style="height: fit-content">
                    <div class="d-flex">
                        <div class="img">
                            <img src="{{ '\storage\images\ ' . $user->img_name }}" alt="..." class="rounded-0"
                                 style="height: 50px">
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
            <div class="d-flex justify-content-center mb-3">
                <div class="mt-4 w-50">
                    <img src="{{ '\storage\images\ ' . $person->img_name }}" alt="">
                    {{--                            <img src="/storage/images/{{$user -> img_name}}">--}}
                </div>
                <div class="mt-3">
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
                            <td>{{ $person->birthday }}</td>
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
