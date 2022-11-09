@extends('layouts.layout')

@section('content')
    <div class="flex__ttl">
        <div class="tab">
            <ul class="tab-menu">
                <li class="tab-menu__item active">
{{--                    <img src="{{ '/storage/images' . $user->img_name }}" alt="">--}}
                    <img src="/storage/images/{{$user -> img_name}}">
                </li>
                <li class="tab-menu__item">
{{--                    <img src="{{ '/storage/images' . $user->img_name }}" alt="">--}}
                    <img src="/storage/images/{{$user -> img_name}}">
                </li>
                <li class="tab-menu__item">
{{--                    <img src="{{ '/storage/images' . $user->img_name }}" alt="">--}}
                    <img src="/storage/images/{{$user -> img_name}}">
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-content__item show">
{{--                    <img src="{{ '/storage/images' . $user->img_name }}" alt="">--}}
                    <img src="/storage/images/{{$user -> img_name}}">
                </div>
                <div class="tab-content__item">
{{--                    <img src="{{ '/storage/images' . $user->img_name2 }}" alt="">--}}
                    <img src="/storage/images/{{$user -> img_name}}">
                </div>
                <div class="tab-content__item">
{{--                    <img src="{{ '/storage/images' . $user->img_name }}" alt="">--}}
                    <img src="/storage/images/{{$user -> img_name}}">
                </div>
            </div>
        </div>
        <div class="ttl">
            <p class="name">{{ $user->name }}</p>
            <p class="nickname">{{ $user->nickname }}</p>
            @if(is_null($user->birth_id))
                <p class="birthday"></p>
            @else
                <p class="birthday">{{ $user->birth->name }}月{{ $user->birthday->name }}日</p>
            @endif

        </div>
    </div>
    <table class="profile">
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
@endsection
