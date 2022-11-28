@extends('layouts.ownerDefault')

@section('content')
    <div class="w-75 m-auto">
        <h1 class="h2 align-content-start w-25">ユーザ登録</h1>
        <form action="{{route('userCreate')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <table class="table">
                <tr>
                    <th>画像</th>
                    <td>
                        <label for="file_photo" class="rounded-circle userProfileImg">
                            <input type="file" id="file_photo" name="img_name">
                        </label>
                    </td>
                </tr>
                <tr>
                    <th>name</th>
                    <td><input type="text" class="w-100" name="name" required autofocus/></td>
                </tr>
                <tr>
                    <th>email</th>
                    <td><input type="email" class="w-100" name="email" required/></td>
                </tr>
                <tr>
                    <th>password</th>
                    <td><input type="password" class="w-100" name="password" required/></td>
                </tr>
                <tr>
                    <th>kind</th>
                    <td>
                        <select name="kind_id" class="w-100" id="">
                            <option value="">選択してください</option>
                            @foreach($kinds as $kind)
                                <option value="{{ $kind->id }}" name="kind_id">
                                    {{ $kind->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </table>
            <button type="submit" class="btn border bg-primary">
                <span class="text-white">登録</span>
            </button>
        </form>
    </div>
@endsection
