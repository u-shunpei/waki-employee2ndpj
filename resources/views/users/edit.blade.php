@extends('layouts.employeeDefault')

@section('content')
    <div class="signupPage">
        <div class="w-75 m-auto">
            <h2>ユーザ詳細</h2>
            <form action="{{ route('employeeEdit', \Illuminate\Support\Facades\Auth::id()) }}" method="POST">
                @csrf
                <table class="table">
                    <tr>
                        <th>
                            <label for="file_photo" class="rounded-circle userProfileImg">
                                <input type="file" id="file_photo" name="img_name">
                            </label>
                        </th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>name</th>
                        <td>
                            <input type="text" class="w-100" name="name" value="{{ $user->name }}"/>
                        </td>
                    </tr>
                    <tr>
                        <th>nickname</th>
                        <td>
                            <input type="text" class="w-100" name="nickname" value="{{ $user->nickname }}"/>
                        </td>
                    </tr>
                    <tr>
                        <th>birthday</th>
                        <td>
                            <input type="date" class="w-100" name="birthday" value="{{ $user->birthday }}"/>
                        </td>
                    </tr>
                    <tr>
                        <th>会社携帯</th>
                        <td><input type="tel" class="w-100" name="tel" value="{{ $user->tel }}"/></td>
                    </tr>
                    <tr>
                        <th>やりたい仕事（ワキに限らず）</th>
                        <td>
                            <input type="text" class="w-100" name="work" value="{{ $user->work }}"/>
                        </td>
                    </tr>
                    <tr>
                        <th>持っている資格、スキル</th>
                        <td>
                            <input type="text" class="w-100" name="skill" value="{{ $user->skill }}"/>
                        </td>
                    </tr>
                    <tr>
                        <th>趣味</th>
                        <td>
                            <input type="text" class="w-100" name="hobby" value="{{ $user->hobby }}"/>
                        </td>
                    </tr>
                    <tr>
                        <th>目標</th>
                        <td>
                            <input type="text" class="w-100" name="target" value="{{ $user->target }}"/>
                        </td>
                    </tr>
                    <tr>
                        <th>自己紹介</th>
                        <td>
                            <textarea class="w-100" name="self_introduction" id="" cols="30" rows="5"></textarea>
                        </td>
                    </tr>
                </table>
                <button type="submit" class="btn border bg-primary">
                    <span class="text-white">保存</span>
                </button>
                <button type="button" class="btn border bg-white">
                    <a href="{{ route('showEmployeeList') }}" class="text-black text-decoration-none">戻る</a>
                </button>
            </form>
        </div>
@endsection

