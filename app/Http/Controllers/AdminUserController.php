<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminUserRequest;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    //列表
    public function index(AdminUser $adminuser){

        $adminuser = $adminuser->orderBy('id','desc')->get();
        $data = [
            'adminuser' => $adminuser
        ];

        return view('admin.adminuser.index' ,$data);
    }

    //添加
    public function add(AdminUser $adminuser){

        $data = [
            'adminuser' => $adminuser
        ];

        return view('admin.adminuser.add', $data);
    }

    //保存
    public function save(AdminUserRequest $request , AdminUser $adminuser){

        //策略保护
        $this->authorizeForUser(Auth::guard('admin')->user(), 'modify', $adminuser);

        //获得提交数据，加入状态
        $data = $request->validated();
        $data['state'] = AdminUser::NORMAL;

        //根据 ID 值判断是添加还是修改
        if($adminuser->id){

            //如果有输入密码就加密，没有就删除密码字段
            if($data['password']){
                //密码加密
                $data['password'] = Hash::make($data['password']);
            }else{
                //删除密码字段
                unset($data['password']);
            }

            //入库
            $adminuser->update($data);
        }else{
            //密码加密
            $data['password'] = Hash::make($data['password']);
            //入库
            $adminuser->create($data);
        }

        //提示并跳转
        alert('操作成功');
        return redirect()->route('admin.adminuser');

    }

    //删除
    public function remove(AdminUser $adminuser){

        //策略保护
        $this->authorizeForUser(Auth::guard('admin')->user(), 'remove', $adminuser);

        $adminuser->delete();

        //提示并跳转
        alert('操作成功');
        return back();

    }

    //状态切换
    public function state(AdminUser $adminuser){

        //策略保护
        $this->authorizeForUser(Auth::guard('admin')->user(),'remove',$adminuser);

        //状态切换
        $new_state = $adminuser->state === AdminUser::NORMAL ? AdminUser::BAN : AdminUser::NORMAL;

        $adminuser->state = $new_state;

        $adminuser->save();

        //提示并跳转
        alert('操作成功');
        return back();


    }
}
