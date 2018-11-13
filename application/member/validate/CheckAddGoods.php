<?php
namespace app\member\validate;
use think\Validate;
class CheckAddGoods extends Validate
{
    /*
    * 验证商家发布商品
    */
    protected $rule = [
        'g_name'  => 'require|max:30',
        'g_secondname'   => 'max:30',
        'g_description'   => 'require|min:5',
//        'g_typeid'=>'require',
        'g_starttime'=>'require',
        'g_endtime'=>'require',
        'gp_settlement_price'=>'require|number|max:10',
        'gp_stock'=>'number|max:10',
        'gp_market_price'=>'number|max:10',
        'g_peoplenumber'=>'require|number|max:10',
        'g_express'=>'number|max:10',
        'g_img'=>'require',

    ];

    protected $message = [
        'g_name.require' => '商品标题必须填写',
        'g_name.max' => '商品标题最多30个字符',
        'g_secondname.max' => '二级标题最多30个字符',
        'g_description.min' => '商品描述最少5个字符',
        'g_description.require' => '商品描述必须填写',
//        'g_typeid.require' => '商品类型必填',
        'g_starttime.require' => '开始时间必填',
        'g_endtime.require' => '结束时间必填',
        'gp_settlement_price.require' => '结算金额必须填写',
        'gp_settlement_price.number' => '结算金额必须为数字',
        'gp_settlement_price.max' => '结算金额最大为十位',
        'gp_stock.number' => '库存必须为数字',
        'gp_stock.max' => '库存最大为十位',
        'gp_market_price.number' => '挂拍价必须为数字',
        'gp_market_price.max' => '挂拍价最大为十位',
        'g_peoplenumber.max' => '参与人数最大为十位',
        'g_peoplenumber.require' => '参与人数不能为空',
        'g_peoplenumber.number' => '参与人数必须为数字',
        'g_express.max' => '快递费最大为十位',
        'g_express.number' => '快递费必须为数字',
        'g_img.require' => '商品图片为必选',
    ];



}
