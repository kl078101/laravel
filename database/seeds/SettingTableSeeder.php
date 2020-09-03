<?php

use App\Models\AdminUser;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Setting $setting)
    {
        //为系统设置填充内容
        $setting->insert([
            'key' => 'webname',
            'value' => '课程管理',
            'name' => '网站名称',
            'comment' => '设置网站名称，显示在相关位置',
            'sort' => 1,
        ]);
        $setting->insert([
            'key' => 'icp',
            'value' => '粤 - xxx',
            'name' => '备案号',
            'comment' => '网站备案号',
            'sort' => 2,
        ]);
        $setting->insert([
            'key' => 'default_state',
            'value' => 1,
            'name' => '管理员默认状态',
            'comment' => '「1」为可用，「0」为禁用',
            'sort' => 3,
        ]);
        $setting->insert([
            'key' => 'page_resource',
            'value' => '15',
            'name' => '资源分页',
            'comment' => '设置每页显示多少条数据',
            'sort' => 4,
        ]);
        $setting->insert([
            'key' => 'ali_access',
            'value' => 'LTAI4Fdw9TBGkQQ7tY7CmEXD',
            'name' => '阿里_ACCESS',
            'comment' => '视频点播参数',
            'sort' => 5,
        ]);
        $setting->insert([
            'key' => 'ali_secret',
            'value' => 'gcruD9mnZ6NOcsZoNF2crApD56GyjG',
            'name' => '阿里_SECRET',
            'comment' => '视频点播参数',
            'sort' => 6,
        ]);
        $setting->insert([
            'key' => 'ali_region',
            'value' => 'cn_shanghai',
            'name' => '阿里_地区ID',
            'comment' => '视频点播参数',
            'sort' => 7,
        ]);
    }
}
