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
                    <td><input type="text" class="w-100" name="name" value="{{ $user->name }}"/></td>
                </tr>
                <tr>
                    <th>email</th>
                    <td><input type="email" class="w-100" name="email" value="{{ $user->email }}"/></td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>
                        @foreach($genders as $gender)
                            <label for="">{{ $gender->name }}</label>
                            <input type="radio" name="gender_id" value="{{ $gender->id }}" checked/>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>kind</th>
                    <td>
                        <select name="kind_id" class="w-100" id="">
                            <option value="{{ $user->kind_id }}">{{ $user->kind->name }}</option>
                            @foreach($kinds as $kind)
                                <option value="{{ $kind->id }}" name="kind_id">
                                    {{ $kind->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>position</th>
                    <td>
                        <select name="position_id" class="w-100" id="position_name">
                            @if(!is_null($user->position->name))
                                <option value="{{ $user->position->id }}">{{ $user->position->name }}</option>
                            @endif
                            @foreach($positions as $position)
                                <option value="{{ $position->id }}" name="position_name">
                                    {{ $position->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>department</th>
                    <td>
                        <select name="department_id" class="w-100" id="department_name">
                            @if(!is_null($user->department->name))
                                <option value="{{ $user->department->id }}">{{ $user->department->name }}</option>
                            @endif
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}" name="department_name">
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>division</th>
                    <td>
                        <select name="division_id" class="w-100" id="division_name">
                            @if(!is_null($user->division->name))
                                <option value="{{ $user->division->id }}">{{ $user->division->name }}</option>
                            @endif
                            @foreach($divisions as $division)
                                <option value="{{ $division->id }}" name="division_name">
                                    {{ $division->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </table>
            <button type="submit" class="btn border" style="background-color: #7bc890">
                <span class="text-white">保存</span>
            </button>
            <button type="button" class="btn border bg-white">
                <a href="{{ route('showUserDetail', $user->id) }}" class="text-black text-decoration-none">戻る</a>
            </button>
        </form>
    </div>
@endsection
