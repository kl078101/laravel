<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Msg extends Model
{
    //定义白名单
    protected $fillable = ['username','content'];
}
