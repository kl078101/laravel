<?php

namespace App\Http\Controllers;

use App\Http\Requests\Gbook;
use App\Kl\Kl;
use App\Models\Msg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MsgController extends Controller
{
    //
    public function index(Msg $msg){

        $msgaa = DB::table('msgs')->where('id' ,'>','2')->get();

        dump($msgaa);

        $msgs = $msg->orderBy('id','desc')->paginate(10);;

        $data = [
            'msgs' => $msgs,
        ];

        return view('gbook',$data);
    }

    public function save(Gbook $request , Msg $msg){

        //获得通过验证的提交数据
        $data = $request->validated();

        //数据入库
        $is = $msg->create($data);

        //跳转回首页
        return redirect()->route('index');
    }

}
