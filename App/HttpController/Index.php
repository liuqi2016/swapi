<?php

namespace App\HttpController;

use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\Http\Message\Status;
use EasySwoole\Validate\Validate;

class Index extends Controller
{

    function index()
    {
        $validate = new Validate();
        $validate->addColumn('name', '姓名')->required()->lengthMax(50);
        //限制name必填并且不能大于50个字符串
        if (!$this->validate($validate)) {
            $this->writeJson(400, [], $validate->getError()->__toString());
            return false;
        }
        $this->writeJson(200, [], 'success');
    }
    function test()
    {
        $this->response()->write("this is test");
    }
    function test2()
    {
        $this->response()->write("this is test2!");
        return true;
    }
    function onRequest(?string $action): ?bool
    {
        if (parent::onRequest($action)) {
            //判断是否登录
            if (0/*伪代码*/) {
                $this->writeJson(Status::CODE_UNAUTHORIZED, '', '登入已过期');
                return false;
            }
            return true;
        }
        return false;
    }
}