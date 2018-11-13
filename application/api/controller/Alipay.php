<?php
namespace app\api\controller;
use app\data\service\recharge\RechargeService;
use think\Controller;
use think\Request;
use think\Url;
use app\data\service\api\ApiService as ApiService;
use app\data\service\member\MemberService as MemberService;
use app\data\service\BaseService as BaseService;
use app\data\service\address\AddressService as AddressService;
use app\data\service\api\ApigoodsService as ApigoodsService;
use app\data\service\api\ApiorderService as ApiorderService;
use app\data\service\goodsDiscounttype\GoodsDiscounttypeService as GoodsDiscounttypeService;
use app\data\service\orderPai\OrderPaiService;


require_once ('../vendor/alipay/AopSdk.php');
class Alipay extends ApiMember
{
    /**
     * 应用ID
     */
    const APPID = '2018080160812888';
    /**
     *请填写开发者私钥去头去尾去回车，一行字符串
     */
    const RSA_PRIVATE_KEY ="MIIEpAIBAAKCAQEA0GHSW3JP5Mow9gixONWB7pH1wgqqd7a7Ox+rsHw4pPjyP4cCnf83H4ZonHEpH/dFi5WV3dmXGZyi7jbgZuZcwwJfLqAMylCTFLgFQoOpfSAcM/hknbJXnaujSrmS0r8aTuLoFLQpePWTXTbPSX+02hPuMMGQoZ7deoaoHipCH893dzUm1KmeEZV3N6J5b0kR5XVM1oLRJWb9d+TVfyUeenJ6Wh129WrCjinQyh3U4BJyA/Soqe+N8+FHe/Ij0Cewol9jpZNA0Vfcqvxq4dfffQGj1GQakESt5DIq5p3s51NA3WKy6Jzjht2YqkaoLBwaPRFs9peFMerqpJaXgnec4wIDAQABAoIBAA7sAllEDU6P4AOuSaqNN3mzAAs+IkjiT/QC55OCwbemkApWi6xuuy7JvDH/tHcyiMtfEdVKIJTX757pVRZpRpk8UT6QfXn7XRzttIq3zOpF418hWWslezqyMMZIFah7wNGHVCEvaYzc4QmaxCs6NuQq6zKYmdfI/YkpnV5TnlqSqpzm3Fl6cgEOmc2XF9AtNDuPo5x7jziTW0GK8Q4RDsy+IcoWYFxKH5qHzoVIs+ZYPBrQdzo2vA2O/Rm8heM54vevHTfyMmxEfJOk4aoz2gnk6oglYd7gk13KQNAQ1etyS0kVyPCdD4ZMk6YLp8g/nAIJ1Eyg5NTQEqad26N6vzkCgYEA70YAX+OdEd9lCWIGwZrD9ZQAMpcmRUEKGyw74OjoEhKDc6H4xvymycsx/t7EgehRl3DjcEQGhZ5e8fJEJlFmSHKsgPtASGP91ZLitf10cndSu3gtDkUumE5lMXIpgqcaA2qwSQ2m9SzherGTU52rr8QLJfzgunHuyUycJSYnaGcCgYEA3vL+fKB9qBkQQKg6mSiiU6Tez0pDFoyPu64cWWTBjlp2t0iUtRAkCfaojpm7HvrM/mkka11ZHetojQeLpQehz/Zq4rdypLkgKMxqXkNimC9Ale7LM/22AnkS7aekJYDaVrz9QPnj3iF3WMvYKRX5DEkHrVbtpL68SEEYKYTSiiUCgYEAxkIrh0iTWj7PejHWRU9WtcKXU1P4qwOUOyWwy9BQksDyWLrJ5x9rl+MdHwE4tCdqi+BHJDvJZ6ftJe7G1zU1WixikVEeV506s1/NKFzFwx7p11phguSCEkNLB+h/SrnpDRG21iFQyPASONawq2UG4FHBpw1crEBBSlyHOSTfHFsCgYEAxoUwveBag3ft1OT3aLGZ+UjxbTr/CfEXe1LJw3/IKe27j/B9GczJimWsKW4SBL/mEROmbkOsusuHSSzS15w4JWmSO1aGKs79J9b9T/pIrKJGrDr5jc34Z7NPe3au3wYhZOLbzyO0F3NNRjAcxljebmYJA/xHl06PcPclgLLYllECgYAw/F71CyEZ5jsj7kdi4bWsBM4xQoHHDANTyZjxGgcopYQ6qLubDA7hVe8wo/PWWNP2/81bkjjV09z+j0UyQXx+nusLub3C0XnSEOM0C+m9ewNQfujo1ok70XLH4u2C81eIA99RGYTp8NwIYsYZvNEEHbawy1cKKqLV8Z3LgUo9fg==";
    /**
     *请填写支付宝公钥，一行字符串
     */
    const ALIPAY_RSA_PUBLIC_KEY ="MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAo2/WZ8wTUbovaCNOyyIY9jj8LWW/DybdFzdosJ+ycgVa9zXXPmzL2fBodbljyJlyQ9NPfg7qzrE5mQmrnyJw5B1fAvWgyT614Rn0EnimdSb+y/yZB11HCzc4EfAVOTDoKt/EkUMqNs44aQtvKiJlUBdJk/e5SSa86eB4xNPSX29wGCyai/6ReAxIrjJ6YUuwVCXruTyKe5knbxwbSwCQPoOnrhy85qftO1RBme+SnL5dzgbUropywNx5Wo86n3cOvmTGQcDGXDsFnCz2JX+cGCOA4KLUVpsN1K+hrOepHsekCtQ9FtN1HfSjbMoAcv+/gunvEzS6tIYlYZdcEl+CxwIDAQAB";




    /**
     * 支付宝服务器主动通知商户服务器里指定的页面
     * @var string
     */
    private $callback = "https://m.paiyy.com.cn/index/notifyali/notifyurl";

    /**
     *生成APP支付订单信息
     * @param string $orderId   商品订单ID
     * @param string $subject   支付商品的标题
     * @param string $body      支付商品描述
     * @param float $pre_price  商品总支付金额
     * @param int $expire       支付交易时间
     * @return bool|string  返回支付宝签名后订单信息，否则返回false
     */
    public function unifiedorder(){
        $r_id=input("r_id");
        if(empty($this->data['r_id'])){
            $this->response_error("充值订单ID不能为空");
        }
        $recharge = new RechargeService();
        $where['r_id']=$r_id;
        $fields="r_id,r_money";
        $info=$recharge->get_info($where,$fields);
        if(empty($info)){
            $this->response_error("充值订单信息为空");
        }
        $o_id=$info['r_id'];
        $r_money=$info['r_money'];
        //商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no =$o_id."-".rand(1,99999).time();
        //订单名称，必填
        $subject ="支付宝APP余额充值";
        //付款金额，必填
        $total_amount = $r_money;
        //商品描述，可空
        $body ="alipay APP会员余额充值";
        //超时时间
        $expire = "6m";

            $aop = new \AopClient();

            $aop->gatewayUrl = "https://openapi.alipay.com/gateway.do";
            $aop->appId = self::APPID;
            $aop->rsaPrivateKey = self::RSA_PRIVATE_KEY;
            $aop->format = "json";
            $aop->charset = "UTF-8";
            $aop->signType = "RSA2";
            $aop->alipayrsaPublicKey = self::ALIPAY_RSA_PUBLIC_KEY;
            //实例化具体API对应的request类,类名称和接口名称对应,当前调用接口名称：alipay.trade.app.pay
            $request = new \AlipayTradeAppPayRequest();

            //SDK已经封装掉了公共参数，这里只需要传入业务参数
            $bizcontent = "{\"body\":\"{$body}\","      //支付商品描述
                . "\"subject\":\"{$subject}\","        //支付商品的标题
                . "\"out_trade_no\":\"{$out_trade_no}\","   //商户网站唯一订单号
                . "\"timeout_express\":\"{$expire}m\","       //该笔订单允许的最晚付款时间，逾期将关闭交易
                . "\"total_amount\":\"{$total_amount}\"," //订单总金额，单位为元，精确到小数点后两位，取值范围[0.01,100000000]
                . "\"product_code\":\"QUICK_MSECURITY_PAY\""
                . "}";
            $request->setNotifyUrl($this->callback);
            $request->setBizContent($bizcontent);

            //这里和普通的接口调用不同，使用的是sdkExecute
            $response = $aop->sdkExecute($request);
            //htmlspecialchars是为了输出到页面时防止被浏览器将关键参数html转义，实际打印到日志以及http传输不会有这个问题
            $ret= htmlspecialchars($response);//就是orderString 可以直接给客户端请求，无需再做处理。
            $result=array();
            $result['pay']=$response;
            $this->response_data($result);

    }

}
