@extends('layouts.ownerDefault')

@section('content')
    <div class="w-75 m-auto">
        <h1 class="h2 align-content-start w-25">ユーザ詳細</h1>
        <form action="{{ route('userEdit', $user->id) }}" method="POST">
            @csrf
        <table class="table">
            <tr>
                <th>ID</th>
                <td>{{ $user->id }}</td>
            </tr>
            <tr>
                <th>name</th>
                <td><input type="text" class="w-100" name="name" value="{{ $user->name }}" /></td>
            </tr>
            <tr>
                <th>email</th>
                <td><input type="email" class="w-100" name="email" value="{{ $user->email }}" /></td>
            </tr>
            <tr>
                <th>kind</th>
                <td><input type="number" class="w-100" name="kind_id" value="{{ $user->kind_id }}" /></td>
            </tr>
{{--            <tr>--}}
{{--                <th>position</th>--}}
{{--                @if(!is_null($user->position_id))--}}
{{--                    <td><input type="text" class="w-100" name="position_name" value="{{ $user->position->name }}" /></td>--}}
{{--                @else--}}
{{--                    <td></td>--}}
{{--                @endif--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <th>department</th>--}}
{{--                @if(!is_null($user->department_id))--}}
{{--                    <td><input type="text" class="w-100" name="department_name" value="{{ $user->department->name }}" /></td>--}}
{{--                @else--}}
{{--                    <td></td>--}}
{{--                @endif--}}

{{--            </tr>--}}
{{--            <tr>--}}
{{--                <th>division</th>--}}
{{--                @if(!is_null($user->division_id))--}}
{{--                    <td><input type="text" class="w-100" name="division_name" value="{{ $user->division->name }}" /></td>--}}
{{--                @else--}}
{{--                    <td></td>--}}
{{--                @endif--}}
{{--            </tr>--}}
        </table>
        <button type="submit" class="btn border bg-primary">
            <span class="text-white">保存</span>
        </button>
        </form>
    </div>
@endsection
