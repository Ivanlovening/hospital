<?php
namespace Vendor\Alidayu;


use AlibabaAliqinFcSmsNumSendRequest;
use Org\Util\Log_;
use TopClient;

require "TopSdk.php";
class Alidayu{

    public $appKey;
    public $secretKey;

    public function __construct( $appkey, $secretKey )
    {
        $this->appkey = $appkey;//"23540374";
        $this->secretKey = $secretKey;//"61aeb95180ad194a67c1a7e8955a62ea";
    }

    /**
     *  发送短信
     *
     * @param array $data
     *  $data = array(
     *       "extend" = > '123456', //公共回传参数，在“消息返回”中会透传回该参数；
     *                                          举例：用户可以传入自己下级的会员ID，在消息返回时，
     *                                          该会员ID会包含在内，
     *                                          用户可以根据该会员ID识别是哪位会员使用了你的应用
     *
     *        "smsType" => "normal" , //短信类型，传入值请填写normal
     *        "SmsFreeSignName"  => "xxxx" , //短信签名，传入的短信签名必须是在阿里大于“管理中心-短信签名管理”中的可用签名。
     *
     *        "SmsParam" => "1222", //验证码参数
     *        "setRecNum" => "13000000000" //手机号码
     *        "SmsTemplateCode" =>"templateID" //短信模板ID
     *
     *
     *
     * )
     *
     *
     */
    public function sendMsg( $data = array() ) {

        $c = new TopClient;
        $c->appkey = $this->appkey;//"23540374";
        $c->secretKey = $this->secretKey;//"61aeb95180ad194a67c1a7e8955a62ea";
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setExtend($data['Extend']);
        $req->setSmsType($data['SmsType']); //normal
        $req->setSmsFreeSignName($data['SmsFreeSignName']); //小聪科技
        $req->setSmsParam($data['SmsParam']);//{"nember":"00001"}
        $req->setRecNum($data['RecNum']); //13662508566
        $req->setSmsTemplateCode($data['SmsTemplateCode']); //SMS_27575173
        //echo 1;exit;
        $resp = $c->execute($req);
        
        return $this->object_to_array( $resp );
    }
    
    public function object_to_array($obj){
        $_arr = is_object($obj)? get_object_vars($obj) :$obj;
        foreach ($_arr as $key => $val){
            $val=(is_array($val)) || is_object($val) ? $this->object_to_array($val) :$val;
            $arr[$key] = $val;
        }
        return $arr;
    }
}





