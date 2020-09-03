<?php

//弹出信息提示框

use App\Models\Setting;

function alert($message, $type='success'){
    session()->flash($type, $message);
}

//获取系统配置指定 key 的值
function setting($key){

    $settings = app('App\Models\Setting')->setting_key($key);

    return $settings[$key];

}
