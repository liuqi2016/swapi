<?php

namespace App\HttpController;


use EasySwoole\Http\AbstractInterface\AbstractRouter;
use FastRoute\RouteCollector;

class Router extends AbstractRouter
{
    function initialize(RouteCollector $routeCollector)
    {
        $this->setGlobalMode(true);
        $routeCollector->addRoute('GET', '/index', '/Index/index');
        // $routeCollector->get('/index', '/Index/index');
        // $routeCollector->get('/user', '/index.html');
        // $routeCollector->get('/', function (Request $request, Response $response) {
        //     $response->write('this router index');
        // });
        // $routeCollector->get('/test', function (Request $request, Response $response) {
        //     $response->write('this router test');
        //     return '/a'; //重新定位到/a方法
        // });
        // $routeCollector->get('/user/{id:\d+}', function (Request $request, Response $response) {
        //     $response->write("this is router user ,your id is {$request->getQueryParam('id')}"); //获取到路由匹配的id
        //     return false; //不再往下请求,结束此次响应
        // });
    }
}