<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function images()
    {
        return $this->belongsTo('App\Images');
    }

    /**
     * Get the list of users with images
     */
    public static function getUsersWithImages(){
        return self::query()
            ->leftjoin('images', function ($join) {
                $join->on('images.subject_id', '=', 'users.id')->where('images.type', '=', 'user');
            })
            ->selectRaw(implode(',',[
                'users.*',
                'images.subject_id',
                'images.type',
                'group_concat(images.name) as image_name',
            ]))
            ->groupBy('users.id')
            ->orderBy('users.id')
            ->get();
    }
}
