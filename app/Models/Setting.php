<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    //软删除
    use SoftDeletes;

    //所有属性都可以批量赋值
    protected $guarded = [];

    protected $setting_keys = null;

    public function setting_key($key){

        if($this->setting_keys === null){
            $this->setting_keys = $this->orderBy('sort', 'asc')->get()->mapWithKeys(function ($item) {
                return [$item['key'] => $item['value']];
            });

        }

        return $this->setting_keys;
    }
}
