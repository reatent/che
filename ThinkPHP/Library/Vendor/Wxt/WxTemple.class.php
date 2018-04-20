<?php
/**
 * 微信模板推送 WxTemple.class..php
 * ============================================================================
 * 版权所有 (C) 2015-2016 壹尚科技有限公司，并保留所有权利。
 * 网站地址:   http://www.ethank.com.cn
 * ----------------------------------------------------------------------------
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * Author: 勾国印 (gouguoyin@ethank.com.cn) 
 * Date: 2016年5月18日 下午11:23:40  
*/
class sendMessage {
    // 推送模版消息
    function getAuthParam() {
        $apiKey = 'rgniXGgOKGPyN7TVDlqg8hMllVc11V1lPiXFtqpjxPg';
        $apiSecret = 'd10f46371b238c91c55d548daa4bc4c5';
        $timestamp = time();
        return array(
            'apiKey' => $apiKey,
            'timestamp' => $timestamp,
            'sig' => md5($apiKey . $apiSecret . $timestamp),
        );
    }
    function sendTempleMessage($data) {
        $param['type'] = 'template';
        $param['templateId'] = 'KCth0-XeqJ1QddnBEXzSEUqVhTN0xYQFg3MpiIgmX0o';
        $param['topcolor'] = '#04a7f9';
        //模版消息跳转地址
        $param['url'] = $data['url'];
        $param['toUsers'] = $data['openid'];
        $param['data'] = $this->getCardTemplateData($data['title'],$data['points'],$data['info'],$data['remark']);
        $send = $this->sendTempleMsg($param);
    }

    //模版消息
    function getCardTemplateData($title,$points,$info,$remark) {
        $templateData = array(
                'first' => array(
                'value' => $msg,
                'color' => '#FF0000'
            ),
            'keyword1' => array(
                'value' => $xm,
                'color' => '#FF0000'
            ),
            'keyword2' => array(
                'value' => $sj,
                'color' => '#FF0000'
            ),
            'keyword3' => array(
                'value' => $msg,
                'color' => '#FF0000'
            ),
            'keyword4' => array(
                'value' => '缺课',
                'color' => '#FF0000'
            ),
            'keyword5' => array(
                'value' => '6',
                'color' => '#FF0000'
            ),
            'remark' => array(
                'value' => '请您及时到后台查看处理',
                'color' => '#FF0000'
            )
        );
        return json_encode($templateData);
    }

    function sendDeliverTempleMessage($data) {
        $param['type'] = 'template';
        $param['templateId'] = 'N-SQ82B-F19ABF-hH84nt-2hacfucnKe7iynnQLyalY';
        $param['topcolor'] = '#04a7f9';
        //模版消息跳转地址
        $param['url'] = $data['url'];
        $param['toUsers'] = $data['openid'];
        $param['data'] = $this->getDeliverCardTemplateData($data['title'],$data['order_id'], $data['remark']);
        $send = $this->sendTempleMsg($param);
    }

    //模版消息
    function getDeliverCardTemplateData($title,$order_id,$remark) {
        $templateData = array(
                'first' => array(
                        'value' => $title,
                        'color' => '#0e356e'
                ),
                'OrderSn' => array(
                        'value' => $order_id,
                        'color' => '#2832e1'
                ),
                'OrderStatus' => array(
                        'value' => '已发货',
                        'color' => '#0e356e'
                ),
                'remark' => array(
                        'value' => $remark,
                        'color' => '#0e356e'
                )
        );
        return json_encode($templateData);
    }

    //set temple by one
    function sendTempleMsg($param) {
        $sendParam = array(
            'a' => 'Send',
            'm' => 'sendTemplate'
        );
        $sendParam = array_merge($this->getAuthParam(), $sendParam);
        $sendParam = array_merge($param, $sendParam);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'api.socialjia.com/index.php');
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($curl, CURLOPT_POST, 1);
        $body = http_build_query($sendParam);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $httpInfo = curl_getinfo($curl);
        curl_close($curl);
        return $response;
    }

}
