@extends('layouts.layout')

@section('content')
    <div class="signupPage">
        <header class="header">
            <div>プロフィールを編集</div>
        </header>

        <form class="form mt-5" method="POST" action="{{ route('update', $user->id) }}" enctype="multipart/form-data">
            @csrf

            @error('email')
            <span class="errorMessage">
        {{ $message }}
    </span>
            @enderror

            <label for="file_photo" class="rounded-circle userProfileImg">
                <div class="userProfileImg_description">画像をアップロード</div>
                <i class="fas fa-camera fa-3x"></i>
                <input type="file" id="file_photo" name="img_name">

            </label>
            <div class="userImgPreview" id="userImgPreview">
                <img id="thumbnail" class="userImgPreview_content" accept="image/*" src="">
                <p class="userImgPreview_text">画像をアップロード済み</p>
            </div>

{{--            <label for="file_photo" class="rounded-circle userProfileImg">--}}
{{--                <div class="userProfileImg_description">画像をアップロード</div>--}}
{{--                <i class="fas fa-camera fa-3x"></i>--}}
{{--                <input type="file" id="file_photo" name="img_name2">--}}

{{--            </label>--}}
{{--            <div class="userImgPreview" id="userImgPreview">--}}
{{--                <img id="thumbnail" class="userImgPreview_content" accept="image/*" src="">--}}
{{--                <p class="userImgPreview_text">画像をアップロード済み</p>--}}
{{--            </div>--}}
{{--            <label for="file_photo" class="rounded-circle userProfileImg">--}}
{{--                <div class="userProfileImg_description">画像をアップロード</div>--}}
{{--                <i class="fas fa-camera fa-3x"></i>--}}
{{--                <input type="file" id="file_photo" name="img_name3">--}}

{{--            </label>--}}
{{--            <div class="userImgPreview" id="userImgPreview">--}}
{{--                <img id="thumbnail" class="userImgPreview_content" accept="image/*" src="">--}}
{{--                <p class="userImgPreview_text">画像をアップロード済み</p>--}}
{{--            </div>--}}
            <div class="form-group">
                <label>名前</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label>愛称</label>
                <input type="text" name="nickname" class="form-control" value="{{ $user->nickname }}">
            </div>
            <div class="form-group">
                <label>誕生日</label><br>
                <select name="birth_name" class="" id="">
                    @if(is_null($user->birth_id))
                        <option value="">選択してください</option>
                    @else
                        <option value="{{ $user->birth->id }}">{{ $user->birth->name }}</option>
                    @endif
                    @foreach($births as $birth)
                        <option value="{{ $birth->id }}" name="birth_name">
                            {{ $birth->name }}
                        </option>
                    @endforeach
                </select>
                <span>月</span>
                <select name="birthday_name" class="" id="">
                    @if(is_null($user->birthday_id))
                        <option value="">選択してください</option>
                    @else
                        <option value="{{ $user->birthday->id }}">{{ $user->birthday->name }}</option>
                    @endif
                    @foreach($birthdays as $birthday)
                        <option value="{{ $birthday->id }}" name="birthday_name">
                            {{ $birthday->name }}
                        </option>
                    @endforeach
                </select>
                <span>日</span>
            </div>
            <div class="form-group">
                <label>役職</label><br>
                <select name="position_name" class="" id="">
                    @if(is_null($user->position_id))
                        <option value="">選択してください</option>
                    @else
                        <option value="{{ $user->position->id }}">{{ $user->position->name }}</option>
                    @endif
                    @foreach($positions as $position)
                        <option value="{{ $position->id }}" name="position_name">
                            {{ $position->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>部署</label><br>
                <select name="department_name" class="" id="">
                    @if(is_null($user->department_id))
                        <option value="">選択してください</option>
                    @else
                        <option value="{{ $user->department->id }}">{{ $user->department->name }}</option>
                    @endif

                    @foreach($departments as $department)
                        <option value="{{ $department->id }}" name="department_name">
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>課</label><br>
                <select name="division_name" class="" id="">
                    @if(is_null($user->division_id))
                        <option value="">選択してください</option>
                    @else
                        <option value="{{ $user->division->id }}">{{ $user->division->name }}</option>
                    @endif

                    @foreach($divisions as $division)
                        <option value="{{ $division->id }}" name="division_name">
                            {{ $division->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>会社携帯</label>
                <input type="tel" name="tel" class="form-control" value="{{ $user->tel }}">
            </div>
            <div class="form-group">
                <label>やりたい仕事（ワキに限らず）</label>
                <input type="text" name="work" class="form-control" value="{{ $user->work }}">
            </div>
            <div class="form-group">
                <label>持っているスキル、資格</label>
                <input type="text" name="skill" class="form-control" value="{{ $user->skill }}">
            </div>
            <div class="form-group">
                <label>趣味</label>
                <textarea name="hobby" class="form-control" rows="5">{{ $user->hobby }}</textarea>
            </div>
            <div class="form-group">
                <label>目標</label>
                <input type="text" name="target" class="form-control" value="{{ $user->target }}">
            </div>
            <div class="form-group">
                <label>自己紹介文</label>
                <textarea class="form-control" name="self_introduction" rows="5">{{$user->self_introduction}}</textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn submitBtn">変更する</button>
            </div>
        </form>
    </div>
@endsection

