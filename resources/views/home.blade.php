@extends('layouts.layout')

@section('content')
    <div class='userAction'>
        <div class="userAction_edit userAction_common">

            <!-- この行を編集 -->
            <a href="{{route('users.show', ['id' => auth()->user()->id])}}"><i class="fas fa-edit fa-2x"></i></a>

            <span>自分のプロフィールへ</span>

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
    <div class="flex__card">
        @foreach($users as $user)
            <div class="card">
                <a href="{{ route('showDetail', $user->id) }}" style="text-decoration: none">
                    <div class="card__img">
{{--                        <img src="{{ '/storage/images' . $user->img_name }}" alt="">--}}
                        <img src="/storage/images/{{$user -> img_name}}">
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

@endsection

