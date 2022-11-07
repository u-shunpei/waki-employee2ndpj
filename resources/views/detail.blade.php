@extends('layouts.layout')

@section('content')
    <div class="flex__ttl">
        <div class="tab">
            <ul class="tab-menu">
                <li class="tab-menu__item active">
                    <img src="{{ '/storage/images' . $user->img_name }}" alt="">
                </li>
                <li class="tab-menu__item">
                    <img src="{{ '/storage/images' . $user->img_name }}" alt="">
                </li>
                <li class="tab-menu__item">
                    <img src="{{ '/storage/images' . $user->img_name }}" alt="">
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-content__item show">
                    <img src="{{ '/storage/images' . $user->img_name }}" alt="">
                </div>
                <div class="tab-content__item">
                    <img src="{{ '/storage/images' . $user->img_name }}" alt="">
                </div>
                <div class="tab-content__item">
                    <img src="{{ '/storage/images' . $user->img_name }}" alt="">
                </div>
            </div>
        </div>
        <div class="ttl">
            <p class="name">{{ $user->name }}</p>
            <p class="nickname">{{ $user->nickname }}</p>
            <p class="birthday">{{ $user->birth->name }}月{{ $user->birthday->name }}日</p>
        </div>
    </div>
    <table class="profile">
        <tr>
            <th>自己紹介</th>
            <td>{{ $user->self_introduction }}</td>
        </tr>
        <tr>
            <th>役職</th>
            <td>{{ $user->position->name }}</td>
        </tr>
        <tr>
            <th>部署</th>
            <td>{{ $user->department->name }}</td>
        </tr>
        <tr>
            <th>課</th>
            <td>{{ $user->division->name }}</td>
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
@endsection
