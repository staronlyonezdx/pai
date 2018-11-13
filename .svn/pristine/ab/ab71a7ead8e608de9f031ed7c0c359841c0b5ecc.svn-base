<?php
namespace app\business\controller;

use app\data\service\orderPai\OrderPaiService as OrderPaiService;
use app\data\service\address\AddressService as AddressService;
use app\data\service\goodsProduct\GoodsProductService as GoodsProductService;
use app\data\service\member\MemberService as MemberService;
use app\data\service\orderAwardcode\OrderAwardcodeService as OrderAwardcodeService;
use think\Config;
use think\Controller;
use think\Cookie;
use think\Db;

class Order extends MemberHome
{

    /**
     * 订单详情
     * 刘勇豪
     */
    public function index(){
        $o_id = input('param.o_id', 0);

        return $this->fetch();
    }

}