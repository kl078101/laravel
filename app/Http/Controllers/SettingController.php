<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function index(Setting $setting){

        //查出列表数据
        $settings = $setting->orderBy('sort','asc')->get();

        $data = [
            'setting' => $settings,
        ];

        return view('admin.setting.index',$data);
    }

    public function save(Request $request ,Setting $setting){
        $settings = $request->input('setting');

        //循环入库
        foreach ($settings as $key=>$value) {
            $value = ($value === null) ?'' : $value;
            $setting->where('key',$key)->update(['value' => $value]);
        }
        alert('操作成功');
        return redirect()->route('admin.setting');
    }
}
