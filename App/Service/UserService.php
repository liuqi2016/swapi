<?php

namespace App\Service;

use EasySwoole\Rpc\AbstractService;

class UserService extends AbstractService
{
    public function serviceName(): string
    {
        return 'UserService';
    }
    public function register()
    {
        $this->response()->setResult([
            'account' => '12345',
            'age' => 26
        ]);
    }
    public function login()
    {
        $this->response()->setResult([
            'account' => '12345',
            'session' => 'xxxxxxxxxxxx'
        ]);
    }
}