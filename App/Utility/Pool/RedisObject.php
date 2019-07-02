<?php

/**
 * Created by PhpStorm.
 * User: Tioncico
 * Date: 2019/3/5 0005
 * Time: 20:42
 */


namespace App\Utility\Pool;

use EasySwoole\Component\Pool\PoolObjectInterface;
use Swoole\Coroutine\Redis;

class RedisObject extends Redis implements PoolObjectInterface
{
    function gc()
    {
        // TODO: Implement gc() method.
        $this->close();
    }

    function objectRestore()
    {
        // TODO: Implement objectRestore() method.
    }

    function beforeUse(): bool
    {
        // TODO: Implement beforeUse() method.
        return true;
    }
}