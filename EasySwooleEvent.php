<?php

/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/5/28
 * Time: 下坈6:33
 */

namespace EasySwoole\EasySwoole;


use EasySwoole\EasySwoole\Swoole\EventRegister;
use EasySwoole\EasySwoole\AbstractInterface\Event;
use EasySwoole\Http\Request;
use EasySwoole\Http\Response;
use App\Service\UserService;
use EasySwoole\Rpc\Rpc;
use EasySwoole\Rpc\Config;
use EasySwoole\Rpc\NodeManager\RedisManager;
use EasySwoole\Component\Timer;

class EasySwooleEvent implements Event
{

    public static function initialize()
    {
        // TODO: Implement initialize() method.
        date_default_timezone_set('Asia/Shanghai');
    }

    public static function mainServerCreate(EventRegister $register)
    {
        #####################  rpc ??1 #######################
        $config = new Config();
        //??????
        $config->setServerIp('127.0.0.1');
        $config->setNodeManager(new RedisManager('127.0.0.1', 6379));
        $config->getBroadcastConfig()->setSecretKey('lucky');

        $rpc = Rpc::getInstance($config);
        $rpc->add(new UserService());
        $rpc->attachToServer(ServerManager::getInstance()->getSwooleServer());
        #####################  rpc ??1 #######################
        #####################  token?? #######################
    }

    public static function onRequest(Request $request, Response $response): bool
    {
        // var_dump($request->getRequestParam());
        // TODO: Implement onRequest() method.
        return true;
    }

    public static function afterRequest(Request $request, Response $response): void
    {
        $responseMsg = $response->getBody()->__toString();
        Logger::getInstance()->console("????:" . $responseMsg);
        var_dump($response->getStatusCode());
    }
}