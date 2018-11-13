<?php
/**
* 腾讯云短信接口Service
*-------------------------------------------------------------------------------------------
* 版权所有 杭州市拍吖吖科技有限公司
* 创建日期 2018-06-20
* 版本 v.1.0.0
* 网站：www.pai.com
*--------------------------------------------------------------------------------------------
*/
namespace app\data\service\sms;
use think\Config;
use Sms\SmsSingleSender;
use app\data\service\BaseService as BaseService;

class AliService extends BaseService
{
    // 身份证AppCode
    protected $AppCode;
	public function __construct()
	{
        $this->AppCode = Config::get('ali.AppCode');
	}
	
    /**
     * 身份证验证
	 * 创建人 邓赛赛
	 * 时间 2018-09-05 17:12:00
     */
	public function id_check($idCard,$name)
	{
	    //请求地址
        $host = 'https://idcert.market.alicloudapi.com';
        //地址
        $path = "/idcard";
        //appcode
        $appcode = $this->AppCode;
        //参数身份证号、姓名
        $querys = "idCard=".$idCard."&name=".$name;
	    $res = $this->send_curl($host,$path,$appcode,$querys);
        $res = json_decode($res,true);
//        return '5555';
	    return $res;
	}

    /**
     * 银行卡验证
     * 邓赛赛
     */
    public function bank_check($accountNo,$idCard,$mobile,$name){
        $host = 'https://bcard3and4.market.alicloudapi.com';
        $path = "/bankCheck4";
        $appcode = $this->AppCode;
        //参数 银行卡号、身份证号、预留手机号码、姓名
        $querys = 'accountNo='.$accountNo.'&idCard='.$idCard.'&mobile='.$mobile.'&name='.$name;
        $res = $this->send_curl($host,$path,$appcode,$querys);
        $res = json_decode($res,true);
        return $res;
    }

    //curl请求
	public function send_curl($host,$path,$appcode,$querys){
        $method = "GET";
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);
//        $querys = "accountNo=6217003810083356892&idCard=511126199112064713&mobile=18502821864&name=%E6%96%BD%E4%BA%AC";
        $bodys = "";
        $url = $host . $path . "?" . $querys;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
//        curl_setopt($curl, CURLOPT_HEADER, true);
//        如不输出json, 请打开这行代码，打印调试头部状态码。
        //状态码: 200 正常；400 URL无效；401 appCode错误； 403 次数用完； 500 API网管错误
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        $out_put = curl_exec($curl);
//        return '444';
        return $out_put;
    }

}