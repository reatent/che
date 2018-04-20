<?php

function sendSms($phone,$code){
    Vendor('Alisms.Core.Config');
    //use Aliyun\Core\Profile\DefaultProfile;
    Vendor('Alisms.Core.Profile.DefaultProfile');
    //use Aliyun\Core\DefaultAcsClient;
    Vendor('Alisms.Core.DefaultAcsClient');
    //use Aliyun\Api\Sms\Request\V20170525\SendSmsRequest;
    Vendor('Alisms.Api.Sms.Request.V20170525.SendSmsRequest');
    //use Aliyun\Api\Sms\Request\V20170525\QuerySendDetailsRequest;
    Vendor('Alisms.Api.Sms.Request.V20170525.QuerySendDetailsRequest');
    // 加载区域结点配置
    \Aliyun\Core\Config::load();
    // 初始化用户Profile实例
    $profile = \Aliyun\Core\Profile\DefaultProfile::getProfile(C('ALI_SMS.REGION'), C('ALI_SMS.KEY_ID'), C('ALI_SMS.KEY_SECRET'));
    // 增加服务结点
    \Aliyun\Core\Profile\DefaultProfile::addEndpoint(C('ALI_SMS.END_POINT_NAME'), C('ALI_SMS.REGION'), C('ALI_SMS.PRODUCT'), C('ALI_SMS.DOMAIN'));
    // 初始化AcsClient用于发起请求
    $acsClient = new \Aliyun\Core\DefaultAcsClient($profile);
    // 初始化SendSmsRequest实例用于设置发送短信的参数
    $request = new \Aliyun\Api\Sms\Request\V20170525\SendSmsRequest();
    // 必填，设置雉短信接收号码
    $request->setPhoneNumbers($phone);
    // 必填，设置签名名称
    $request->setSignName('哈弗养车');
    // 必填，设置模板CODE
    $request->setTemplateCode('SMS_114035014');
    $params = array(
        'code' => $code
    );
    // 可选，设置模板参数
    $request->setTemplateParam(json_encode($params));
    // 可选，设置流水号
    //if($outId) {
    //    $request->setOutId($outId);
    //}
    // 发起访问请求
    $acsResponse = $acsClient->getAcsResponse($request);
    // 打印请求结果
    // var_dump($acsResponse);
    return $acsResponse;
}






















function getpage($count, $pagesize = 10) {
    $p = new Think\Page($count, $pagesize);
    $p->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
    $p->setConfig('prev', '上一页');
    $p->setConfig('next', '下一页');
    $p->setConfig('last', '末页');
    $p->setConfig('first', '首页');
    $p->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
    $p->lastSuffix = false;//最后一页不显示为总页数
    return $p;
}


function getfirstchar($s0){
    $fchar = ord($s0{0});
    if($fchar >= ord("A") and $fchar <= ord("z") )return strtoupper($s0{0});
    $s1 = get_encoding($s0,'GB2312');
    $s2 = get_encoding($s1,'UTF-8');
    if($s2 == $s0){$s = $s1;}else{$s = $s0;}
    $asc = ord($s{0}) * 256 + ord($s{1}) - 65536;
    if($asc >= -20319 and $asc <= -20284) return "A";
    if($asc >= -20283 and $asc <= -19776) return "B";
    if($asc >= -19775 and $asc <= -19219) return "C";
    if($asc >= -19218 and $asc <= -18711) return "D";
    if($asc >= -18710 and $asc <= -18527) return "E";
    if($asc >= -18526 and $asc <= -18240) return "F";
    if($asc >= -18239 and $asc <= -17923) return "G";
    if($asc >= -17922 and $asc <= -17418) return "H";
    if($asc >= -17417 and $asc <= -16475) return "J";
    if($asc >= -16474 and $asc <= -16213) return "K";
    if($asc >= -16212 and $asc <= -15641) return "L";
    if($asc >= -15640 and $asc <= -15166) return "M";
    if($asc >= -15165 and $asc <= -14923) return "N";
    if($asc >= -14922 and $asc <= -14915) return "O";
    if($asc >= -14914 and $asc <= -14631) return "P";
    if($asc >= -14630 and $asc <= -14150) return "Q";
    if($asc >= -14149 and $asc <= -14091) return "R";
    if($asc >= -14090 and $asc <= -13319) return "S";
    if($asc >= -13318 and $asc <= -12839) return "T";
    if($asc >= -12838 and $asc <= -12557) return "W";
    if($asc >= -12556 and $asc <= -11848) return "X";
    if($asc >= -11847 and $asc <= -11056) return "Y";
    if($asc >= -11055 and $asc <= -10247) return "Z";
    return null;
}

function get_encoding($data,$to){
    $encode_arr=array('UTF-8','ASCII','GBK','GB2312','BIG5','JIS','eucjp-win','sjis-win','EUC-JP');
    $encoded=mb_detect_encoding($data, $encode_arr);
    $data = mb_convert_encoding($data,$to,$encoded);
    return $data;
}

function pinyin1($zh){
    $ret = "";
    $s1 = iconv("UTF-8","gb2312", $zh);
    $s2 = iconv("gb2312","UTF-8", $s1);
    if($s2 == $zh){$zh = $s1;}
    for($i = 0; $i < strlen($zh); $i++){
        $s1 = substr($zh,$i,1);
        $p = ord($s1);
        if($p > 160){
            $s2 = substr($zh,$i++,2);
            $ret .= getfirstchar($s2);
        }else{
            $ret .= $s1;
        }
    }
    return $ret;
}

/*短信接口*/


function wxpay($openId,$goods,$order_sn,$total_fee,$attach){
    require_once APP_ROOT."/Api/WxPay.Api.php";
    require_once APP_ROOT."/Api/WxPay.JsApiPay.php";
    require_once APP_ROOT.'/Api/log.php';

    //初始化日志
    $logHandler= new CLogFileHandler(APP_ROOT."/Api/logs/".date('Y-m-d').'.log');
    $log = Log::Init($logHandler, 15);

    $tools = new JsApiPay();
    if(empty($openId)) $openId = $tools->GetOpenid();

    $input = new WxPayUnifiedOrder();
    $input->SetBody($goods);                 //商品名称
    $input->SetAttach($attach);                  //附加参数,可填可不填,填写的话,里边字符串不能出现空格
    $input->SetOut_trade_no($order_sn);          //订单号
    $input->SetTotal_fee($total_fee);            //支付金额,单位:分
    $input->SetTime_start(date("YmdHis"));       //支付发起时间
    $input->SetTime_expire(date("YmdHis", time() + 600));//支付超时
    $input->SetGoods_tag("test3");
    //$input->SetNotify_url("http://".$_SERVER['HTTP_HOST']."/payment.php");  //支付回调验证地址
    $input->SetNotify_url("http://".$_SERVER['HTTP_HOST']."/payment.php/WexinApi/WeixinPay/notify");
    $input->SetTrade_type("JSAPI");              //支付类型
    $input->SetOpenid($openId);                  //用户openID
    $order = WxPayApi::unifiedOrder($input);    //统一下单

    $jsApiParameters = $tools->GetJsApiParameters($order);

    return $jsApiParameters;
}



?>