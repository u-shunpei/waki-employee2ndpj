<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'self_introduction',
        'img_name',
        'gender_id',
        'kind_id',
        'position_id',
        'department_id',
        'division_id',
        'birthday',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function division()
    {
        return $this->belongsTo('App\Models\Division');
    }

    public function position()
    {
        return $this->belongsTo('App\Models\Position');
    }

    public function kind()
    {
        return $this->belongsTo('App\Models\Kind');
    }

    public function gender()
    {
        return $this->belongsTo('App\Models\Gender');
    }

    //検索機能
    public static function searchShops($department_id, $division_id, $keyword)
    {
        $query = User::query();

        if (!empty($department_id)) {
            $query->whereHas('department', function ($query) use ($department_id) {
                $query->where('id', $department_id);
            });
        } else {
            $query->with('department');
        }

        if (!empty($division_id)) {
            $query->whereHas('division', function ($query) use ($division_id) {
                $query->where('id', $division_id);
            });
        } else {
            $query->with('division');
        }

        if (!empty($keyword)) {
            $query->where('name', 'like', "%$keyword%");
        }

        $users = $query->get();

        return $users;
    }

    public static function searchUsers($gender_id, $keyword)
    {
        $query = User::query();

        if (!empty($gender_id)) {
            $query->whereHas('gender', function ($query) use ($gender_id) {
                $query->where('id', $gender_id);
            });
        } else {
            $query->with('gender');
        }

        if (!empty($keyword)) {
            $query->where('name', 'like', "%$keyword%");
        }

        $users = $query->get();

        return $users;
    }

    public static function order($select)
    {
        if($select === 'asc'){
            return self::orderBy('birthday', 'asc')->get();
        } elseif($select === 'desc') {
            return self::orderBy('birthday', 'desc')->get();
        } else {
            return self::all();
        }
    }

}
