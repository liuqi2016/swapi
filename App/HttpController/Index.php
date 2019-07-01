<?php

namespace App\HttpController;

use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\Http\Message\Status;
use EasySwoole\Validate\Validate;
use App\Model\Member\MemberModel;
use App\Model\ConditionBean;
use EasySwoole\Spl\SplBean;

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
    function testMysql()
    {
        //由于Member4Model构造函数已经获取了一条数据库连接
        //在析构函数中又释放了,所以可以直接new model使用
        $memberModel = new MemberModel();
        //new 一个条件类,方便传入条件
        $conditionBean = new ConditionBean();
        $conditionBean->addWhere('name', '', '<>');
        $data = $memberModel->getAll($conditionBean->toArray([], SplBean::FILTER_NOT_NULL));
        $this->response()->write(json_encode($data));
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