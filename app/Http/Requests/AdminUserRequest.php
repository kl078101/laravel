<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $adminuser = $this->route('adminuser');

        if($adminuser){
            //修改验证
            $rules = [
                'username' => [
                    'required', //用户名不能为空
                    Rule::unique('admin_users', 'username')->ignore($adminuser->id), //用户名的唯一性并忽略当前数据
                ],
                'password' => 'same:password2'  //不能为空和是否一致
            ];

        }else{
            //添加验证
            $rules = [
                'username' => [
                    'required', //用户名不能为空
                    Rule::unique('admin_users', 'username'), //用户名的唯一性
                ],
                'password' => 'required | same:password2'  //不能为空和是否一致
            ];
        }


        return $rules;
    }

    public function attributes(){
        return [
            'password2' => '确认密码',
        ];
    }
}
