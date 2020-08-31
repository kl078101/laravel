<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminUser extends Authenticatable
{
    //软删除
    use SoftDeletes;

    //白名单
    protected $fillable = ['username' , 'password' , 'state'];

    //状态常量
    const NORMAL = 1; //正常，可登陆
    const BAN = 0; //禁用，不可登陆

    public function getStateTextAttribute()
    {
        return config('project.admin.state')[$this->state];
    }
}
