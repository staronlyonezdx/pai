<?php
namespace app\msg\controller;

use app\member\controller\MemberHome;
use RedisCache\RedisCache;

class Index extends MemberHome
{
    /**
     * 聊天首页
     */
    public function onlinetalk(){
        return view();
    }


}