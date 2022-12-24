<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="w-75 m-auto">
    <h1 class="h2 align-content-start w-25">ユーザ登録</h1>
    <form action="{{route('googleUserCreate', $user->id)}}" method="POST" enctype="multipart/form-data">
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
                <td><input type="text" class="w-100" name="name" value="{{ $user->name }}" required autofocus/></td>
            </tr>
            <tr>
                <th>email</th>
                <td><input type="email" class="w-100" name="email" value="{{ $user->email }}" readonly></td>
            </tr>
            <tr>
                <th>性別</th>
                <td>
                    @foreach($genders as $gender)
                        <label for="">{{ $gender->name }}</label>
                        <input type="radio" name="gender_id" value="{{ $gender->id }}"/>
                    @endforeach
                </td>
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
            <tr>
                <th>役職</th>
                <td>
                    <select name="position_id" class="w-100" id="">
                        <option value="">選択してください</option>
                        @foreach($positions as $position)
                            <option value="{{ $position->id }}" name="position_id">
                                {{ $position->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>部署</th>
                <td>
                    <select name="department_id" class="w-100" id="">
                        <option value="">選択してください</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" name="department_id">
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>課</th>
                <td>
                    <select name="division_id" class="w-100" id="">
                        <option value="">選択してください</option>
                        @foreach($divisions as $division)
                            <option value="{{ $division->id }}" name="division_id">
                                {{ $division->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
        </table>
        <button type="submit" class="btn border" style="background-color: #7bc890">
            <span class="text-white">登録</span>
        </button>
    </form>
</div>
</body>
