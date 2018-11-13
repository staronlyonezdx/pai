<?php
namespace app\common\model;
class Goods extends \think\Model
{
	//自动验证
	protected $_validate = array(
	    array('goods_sn','','商品货号已经存在！',0,'unique',1), 

	);
	//自动完成
	protected $_auto = array ( 

	);
	//添加当前时间
	protected function Dtime() {
		return date('Y-m-d H:i:s');
	}
	//添加当前管理员
	protected function userid() {
		return $_SESSION['ThinkUser']['ID'];
	}
}
