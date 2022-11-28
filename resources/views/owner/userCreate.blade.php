@extends('layouts.ownerDefault')

@section('content')
    <div class="w-75 m-auto">
        <h1 class="h2 align-content-start w-25">ユーザ登録</h1>
        <form action="" method="POST">
            @csrf
            <table class="table">
                <tr>
                    <th>ID</th>
                    <td></td>
                </tr>
                <tr>
                    <th>name</th>
                    <td><input type="text" class="w-100" name="name" value=""/></td>
                </tr>
                <tr>
                    <th>email</th>
                    <td><input type="email" class="w-100" name="email" value=""/></td>
                </tr>
                <tr>
                    <th>kind</th>
                    <td><input type="number" class="w-100" name="kind_id" value=""/></td>
                </tr>
            </table>
            <button type="submit" class="btn border bg-primary">
                <span class="text-white">登録</span>
            </button>
        </form>
    </div>
@endsection
