@extends('layouts.layout')

@section('content')
    {{--    <div class='signinPage'>--}}
    {{--        <div class='container'>--}}
    {{--            <div class='userIcon'>--}}
    {{--                <i class="fas fa-user fa-3x"></i>--}}
    {{--            </div>--}}
    {{--            <h2 class="title">ログイン</h2>--}}
    {{--            <form class="form" method="POST" action="{{ route('login') }}">--}}
    {{--                @csrf--}}
    {{--                <div class="form-group @error('email')has-error @enderror">--}}
    {{--                    <label>メールアドレス</label>--}}
    {{--                    <input type="email" name="email" class="form-control" placeholder="メールアドレスを入力してください" autofocus>--}}
    {{--                    @error('email')--}}
    {{--                    <span class="errorMessage">--}}
    {{--          {{ $message }}--}}
    {{--        </span>--}}
    {{--                    @enderror--}}
    {{--                </div>--}}

    {{--                <div class="form-group @error('password')has-error @enderror">--}}
    {{--                    <label>パスワード</label>--}}
    {{--                    <input type="password" name="password" class="form-control" placeholder="パスワードを入力してください">--}}
    {{--                    @error('password')--}}
    {{--                    <span class="errorMessage">--}}
    {{--          {{ $message }}--}}
    {{--        </span>--}}
    {{--                    @enderror--}}
    {{--                </div>--}}

    {{--                <div class="form-group text-center">--}}
    {{--                    <button type="submit" class="loginBtn">ログイン</button>--}}
    {{--                </div>--}}
    {{--                <div class="linkToLogin">--}}
    {{--                    <a href="{{ route('register') }}">アカウント作成はこちら</a>--}}
    {{--                </div>--}}
    {{--            </form>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div class="form-wrapper">
        <h1>Sign In</h1>
        <form class="form-control" method="post" action="{{ route('login') }}">
            @csrf
            <div class="form-item">
                <label for="email"></label>
                <input type="email" name="email" required="required" placeholder="Email Address" autofocus></input>
            </div>
            <div class="form-item">
                <label for="password"></label>
                <input type="password" name="password" required="required" placeholder="Password"></input>
            </div>
            <div class="button-panel">
                <input type="submit" class="button" title="Sign In" value="Sign In"></input>
            </div>
        </form>
        <div class="form-footer">
            <p><a href="{{ route('register') }}">Create an account</a></p>
            <p><a href="#">Forgot password?</a></p>
        </div>
    </div>
@endsection

