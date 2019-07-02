<?php

/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/11/26
 * Time: 12:31 PM
 */

namespace App\Model;

use App\Utility\Pool\MysqlObject;
use App\Utility\Pool\MysqlPool;
use EasySwoole\Component\Pool\PoolManager;

/**
 * model写法,通过构造函数和析构函数去获取/回收连接
 * Class BaseModel
 * @package App\Model
 */
class BaseModel
{
    private $db;
    function __construct()
    {
        $this->db = MysqlPool::defer();
    }
    protected function getDb(): MysqlObject
    {
        return $this->db;
    }
    function getDbConnection(): MysqlObject
    {
        return $this->db;
    }
    // public function __destruct()
    // {
    //     PoolManager::getInstance()->getPool(MysqlPool::class)->recycleObj($this->getDb());
    //     // TODO: Implement __destruct() method.
    // }
}