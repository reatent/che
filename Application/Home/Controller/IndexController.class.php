<?php
namespace Home\Controller;

use Think\Controller;
use Aliyun\Core\Config;
use Aliyun\Core\Profile\DefaultProfile;
use Aliyun\Core\DefaultAcsClient;
use Aliyun\Api\Sms\Request\V20170525\SendSmsRequest;
use Aliyun\Api\Sms\Request\V20170525\QuerySendDetailsRequest;


class IndexController extends Controller
{


    public function index()
    {
        $student = M("user");
        $code = $_GET['code'];
        $_SESSION['code'] = $code;
		
        if ($_SESSION['code'] == "") {
            $this->redirect('code');
        }
		
		
		//$weixin =  file_get_contents("https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx41bec5da2490c1e8&secret=d10f46371b238c91c55d548daa4bc4c5&code=".$code."&grant_type=authorization_code");//通过code换取网页授权access_token
//$jsondecode = json_decode($weixin); //对JSON格式的字符串进行编码
//$array = get_object_vars($jsondecode);//转换成数组
//$openid = $array['openid'];
		
		
		
        $get_token_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx41bec5da2490c1e8&secret=d10f46371b238c91c55d548daa4bc4c5&code=" . $code . "&grant_type=authorization_code";
		
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $get_token_url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
        $res = curl_exec($ch);
		
        curl_close($ch);
        $json_obj = json_decode($res, true);
		
        $openid = $json_obj["openid"];
		
        $_SESSION['openid'] = $openid;
        $info = $student->where("openid='$openid'")->find();
        if ($info) {

            $this->display();
        } else {
			
			
			
			
            $access_token = $this->taken();
			
			
			$url="https://api.weixin.qq.com/cgi-bin/user/info?access_token=" . $access_token . "&openid=" . $openid;
        $json=file_get_contents($url);//这个地方不能用file_get_contents  
        $json_obj=json_decode($json,true);  
			
			/*
            $get_token_url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=" . $access_token . "&openid=" . $openid;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $get_token_url);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
            $res = curl_exec($ch);
            curl_close($ch);
            $json_obj = json_decode($res, true);*/
//var_dump($json_obj);
//exit;
            if ($json_obj['subscribe'] == 0) {
                $this->error("你没关注公众号,请关注", "https://mp.weixin.qq.com/s/goPjEau9h9uQp65nuIHdPA", 1);
            } else {
                $nickname = $json_obj['nickname'];
                $headimgurl = $json_obj['headimgurl'];
                $student->username = $nickname;
                $student->openid = $openid;
                $student->headimgurl = $headimgurl;
                if ($student->add()) {
                    $this->redirect('index');
                }
            }
        }

    }


    function code()
    {
        $appid = "wx41bec5da2490c1e8";
        header("Location:https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $appid . "&redirect_uri=http://haval.weiyunke.com.cn/web/haval/&respo@nse_type=code&scope=snsapi_userinfo&STATE=1#wechat_redirect");
    }


    function taken()
    {
        $appid = 'wx41bec5da2490c1e8';
        $secret = 'd10f46371b238c91c55d548daa4bc4c5';
		
		$url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$secret;  
        $json=file_get_contents($url);//这个地方不能用file_get_contents  
        $json_obj=json_decode($json,true);  
		//var_dump($json_obj);
		//exit;
		/*
        $get_token_url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . $appid . "&secret=" . $secret;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $get_token_url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        $res = curl_exec($ch);
        curl_close($ch);
        $json_obj = json_decode($res, true);
*/
        return $json_obj['access_token'];
    }


    function logo2($shijia)
    {
        $_SESSION['shijia'] = $shijia;
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $carbrand = M("carbrand");
        $orderinfo = $carbrand->field('firstword')->where("carname like '%哈弗%'")->group('firstword')->select();

        foreach ($orderinfo as $n => $val) {
            $orderinfo[$n]['voo'] = $carbrand->where("firstword='" . $val['firstword'] . "'")->where("carname like '%哈弗%'")->select();
        }
        $this->assign("orderinfo", $orderinfo);
        $this->display();
    }

    function logo3()
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $carbrand = M("carbrand");;
        $orderinfo = $carbrand->field('firstword')->group('firstword')->select();
        foreach ($orderinfo as $n => $val) {
            $orderinfo[$n]['voo'] = $carbrand->where("firstword='" . $val['firstword'] . "'")->select();
        }
        $this->assign("orderinfo", $orderinfo);
        $this->display();
    }

    function logo4($bytype)
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $_SESSION['bytype'] = $bytype;
        $carbrand = M("carbrand");;
        $orderinfo = $carbrand->field('firstword')->group('firstword')->select();
        foreach ($orderinfo as $n => $val) {
            $orderinfo[$n]['voo'] = $carbrand->where("firstword='" . $val['firstword'] . "'")->select();
        }
        $this->assign("orderinfo", $orderinfo);
        $this->display();
    }

    function logo5($zl)
    {
        $_SESSION['zl'] = $zl;

        if (!session("?openid")) {
            $this->redirect('code');
        }
        $carbrand = M("carbrand");
        if($_SESSION['zl']==1) {
            $orderinfo = $carbrand->field('firstword')->group('firstword')->where("carname like '%哈弗%'")->select();
            foreach ($orderinfo as $n => $val) {
                $orderinfo[$n]['voo'] = $carbrand->where("firstword='" . $val['firstword'] . "'")->where("carname like '%哈弗%'")->select();
            }
        }
        else{
            $orderinfo = $carbrand->field('firstword')->group('firstword')->select();
            foreach ($orderinfo as $n => $val) {
                $orderinfo[$n]['voo'] = $carbrand->where("firstword='" . $val['firstword'] . "'")->select();
            }
    }

        $this->assign("orderinfo", $orderinfo);
        $this->display();
    }

    function asdmd2($id)
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $carmodel = M("carmodel");
        $info = $carmodel->table("sw_carbrand carbrand,sw_carmodel carmodel")->where("carbrand.id=carmodel.bid and bid='$id'")->select();
        $this->assign("info", $info);
        $this->assign("infos", $info[0]['carname']);
        $this->display();
    }

    function asdmd3($id)
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $carmodel = M("carmodel");
        $info = $carmodel->table("sw_carbrand carbrand,sw_carmodel carmodel")->where("carbrand.id=carmodel.bid and bid='$id'")->select();
        $this->assign("info", $info);
        $this->assign("infos", $info[0]['carname']);
        $this->display();
    }

    function asdmd4($id)
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $carmodel = M("carmodel");
        $info = $carmodel->table("sw_carbrand carbrand,sw_carmodel carmodel")->where("carbrand.id=carmodel.bid and bid='$id'")->select();
        $this->assign("info", $info);
        $this->assign("infos", $info[0]['carname']);
        $this->display();
    }

    function asdmd5($id)
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $carmodel = M("carmodel");
        $info = $carmodel->table("sw_carbrand carbrand,sw_carmodel carmodel")->where("carbrand.id=carmodel.bid and bid='$id'")->select();
        $this->assign("info", $info);
        $this->assign("infos", $info[0]['carname']);
        $this->display();
    }

    function db11pl2($id)
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $displacement = M('displacement');
        $info = $displacement->table("sw_carbrand carbrand,sw_carmodel carmodel,sw_displacement displacement")->where("carbrand.id=carmodel.bid  and carmodel.mid =displacement.mid and displacement.mid='$id' and displacementname like '%试驾%'")->select();
        $this->assign("info", $info);
        $this->assign("infos", $info[0]['carname']);
        $this->display();
    }

    function db11pl3($id)
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $displacement = M('displacement');
        $info = $displacement->table("sw_carbrand carbrand,sw_carmodel carmodel,sw_displacement displacement")->where("carbrand.id=carmodel.bid  and carmodel.mid =displacement.mid and displacement.mid='$id'  and displacementname NOT  like  '%试驾%' ")->select();
        $this->assign("info", $info);
        $this->assign("infos", $info[0]['carname']);
        $this->display();
    }

    function db11pl4($id)
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $displacement = M('displacement');
        $info = $displacement->table("sw_carbrand carbrand,sw_carmodel carmodel,sw_displacement displacement")->where("carbrand.id=carmodel.bid  and carmodel.mid =displacement.mid and displacement.mid='$id' and displacementname NOT  like  '%试驾%' ")->select();
        $this->assign("info", $info);
        $this->assign("infos", $info[0]['carname']);
        $this->display();
    }

    function db11pl5($id)
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $displacement = M('displacement');
        $info = $displacement->table("sw_carbrand carbrand,sw_carmodel carmodel,sw_displacement displacement")->where("carbrand.id=carmodel.bid  and carmodel.mid =displacement.mid and displacement.mid='$id' and displacementname NOT  like  '%试驾%' ")->select();
        $this->assign("info", $info);
        $this->assign("infos", $info[0]['carname']);
        $this->display();
    }

    function yuyue2($id)
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $displacement = M('displacement');
        $info = $displacement->table("sw_carbrand carbrand,sw_carmodel carmodel,sw_displacement displacement")->where("carbrand.id=carmodel.bid  and carmodel.mid =displacement.mid and displacement.did='$id' ")->select();
        $this->assign("info", $info);
        $this->assign("infos", $info[0]);
        $this->display();
    }

    function yuyue3($id)
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $_SESSION['sum1'] = $_SESSION['sum'];
        $_SESSION['sum'] = 0;
        $_SESSION['lingjian1'] = $_SESSION['lingjian'];
        $_SESSION['lingjian'] = "";
        $displacement = M('displacement');
        $info = $displacement->table("sw_carbrand carbrand,sw_carmodel carmodel,sw_displacement displacement")->where("carbrand.id=carmodel.bid  and carmodel.mid =displacement.mid and displacement.did='$id' ")->select();
        $this->assign("info", $info);
        $this->assign("infos", $info[0]);
        $this->display();
    }

    function yuyue4($did)
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $this->assign("did", $did);
        $this->display();
    }

    function yuyue5($id)
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $displacement = M('displacement');
        $info = $displacement->table("sw_carbrand carbrand,sw_carmodel carmodel,sw_displacement displacement")->where("carbrand.id=carmodel.bid  and carmodel.mid =displacement.mid and displacement.did='$id' ")->select();
        $this->assign("info", $info);
        $this->assign("infos", $info[0]);
        $this->display();
    }

    function addyuyue()
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $rand = rand(100000, 999999);
        $_SESSION['tel'] = $_POST['tel'];
        $_SESSION['yzm'] = $rand;

        $aaa = (Array)sendSms($_POST['tel'], $rand);
        $rands = date("YmdHis") . rand(1000, 9999);
        $shijia = M("shijia");
        $shijia->create();
        $shijia->rands = $rands;
        $shijia->openid = $_SESSION['openid'];
        $shijia->shijia = $_SESSION['shijia'];

        if ($aaa['Code'] == "OK" && $shijia->add()) {
            $this->redirect("Index/yztel?rands=$rands&&rand=$rand");
        } else {
            $this->error("预约失败");
        }
    }

    function addyuyue1()
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $rand = rand(100000, 999999);
        $_SESSION['yzm'] = $rand;
        $_SESSION['tel'] = $_POST['tel'];
        $aaa = (Array)sendSms($_POST['tel'], $rand);
        $rands = date("YmdHis") . rand(1000, 9999);
        $shijia = M("ybj");
        $shijia->create();
        $shijia->rands = $rands;
        $shijia->lingjian = ltrim($_SESSION['lingjian1'], ",");
        $shijia->openid = $_SESSION['openid'];
        $shijia->price = $_SESSION['sum1'];
        if ($aaa['Code'] == "OK" && $shijia->add()) {
            $_SESSION['sum1'] = 0;
            $_SESSION['lingjian1'] = "";
            $this->redirect("Index/yztel1?rands=$rands&&rand=$rand");
        } else {
            $this->error("预约失败");
        }
    }

    function addyuyue3()
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $rand = rand(100000, 999999);
        $_SESSION['yzm'] = $rand;
        $_SESSION['tel'] = $_POST['tel'];
        $aaa = (Array)sendSms($_POST['tel'], $rand);
        $rands = date("YmdHis") . rand(1000, 9999);
        $shijia = M("wx");
        $shijia->create();
        $shijia->rands = $rands;
        $shijia->openid = $_SESSION['openid'];
        $shijia->zl = $_SESSION['zl'];
        if ($aaa['Code'] == "OK" && $shijia->add()) {
            $this->redirect("Index/yztel3?rands=$rands");
        } else {
            $this->error("预约维修失败");
        }
    }


    function addyuyue2()
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $_SESSION['bysum'] = 0;
        $dc = M("dc");
        $dcid = "";
        $aaa = array_values($_SESSION['cid']);
        for ($i = 0; $i < count($_SESSION['cid']); $i++) {
            $infos = $dc->where(" dcid='$aaa[$i]'")->find();
            $_SESSION['bysum'] += $infos['dcprice'];
            $dcid = $dcid . "," . $aaa[$i];
        }

        $rand = rand(100000, 999999);
        $_SESSION['yzm'] = $rand;
        $_SESSION['tel'] = $_POST['tel'];

        $aaa = (Array)sendSms($_POST['tel'], $rand);
        $rands = date("YmdHis") . rand(1000, 9999);
        $shijia = M("by");
        $shijia->create();
        $shijia->rands = $rands;
        $shijia->lingjian = ltrim($dcid, ",");
        $shijia->openid = $_SESSION['openid'];
        $shijia->price = $_SESSION['bysum'];
        $shijia->bytype = $_SESSION['bytype'];
        if ($aaa['Code'] == "OK" && $shijia->add()) {
            $_SESSION['bysum'] = 0;
            $_SESSION['cid'] = array();
            $this->redirect("Index/yztel2?rands=$rands");
        } else {
            $this->error("预约失败");
        }
    }

    function yztel($rands, $rand)
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $this->assign("rands", $rands);
        $this->assign("rand", $rand);
        $this->display();
    }

    function yztel1($rands, $rand)
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $this->assign("rands", $rands);
        $this->assign("rand", $rand);
        $this->display();
    }

    function yztel2($rands)
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $this->assign("rands", $rands);
        $this->display();
    }

    function yztel3($rands)
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $this->assign("rands", $rands);
        $this->display();
    }

    function yzcode()
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $shijia = M("shijia");
        $info = $shijia->where("rands='" . I("post.id") . "'")->find();
        if ($_POST['yzm'] == $_SESSION['yzm']) {
            $shijia = M("shijia");
            $shijia->create();
            $shijia->yid = $info['yid'];
            $shijia->zhuangtai = 1;
            if ($shijia->save()) {
                $_SESSION['yzm'] = "";
                $_SESSION['tel'] = "";
                $user = M("user");
                $wxmbs = $user->where("role1=1")->select();
                if ($wxmbs) {
                    foreach ($wxmbs as $row) {

                        $this->wxmb($info['xm'], $info['sj'], "有新的试驾预约订单", $row['openid']);
                    }
                }
                $this->success("预约成功", "index");
            } else {
                $this->error("预约失败");
            }
        } else {
            $this->error("验证码错误，请重新输入");
        }
    }

    function yzcode3()
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $shijia = M("wx");
        $info = $shijia->where("rands='" . I("post.id") . "'")->find();
        if ($_POST['yzm'] == $_SESSION['yzm']) {
            $shijia = M("wx");
            $shijia->create();
            $shijia->wid = $info['wid'];
            $shijia->zhuangtai = 1;
            if ($shijia->save()) {
                $_SESSION['yzm'] = "";
                $_SESSION['tel'] = "";
                $user = M("user");
                $wxmbs = $user->where("role3=1")->select();
                if ($wxmbs) {
                    foreach ($wxmbs as $row) {

                        $this->wxmb($info['xm'], $info['sj'], "有新的维修预约订单", $row['openid']);
                    }
                }
                $this->success("预约成功", "index");
            } else {
                $this->error("预约失败");
            }
        } else {
            $this->error("验证码错误，请重新输入");
        }
    }

    function yzcode1()
    {//钣金喷漆
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $shijia = M("ybj");
        $info = $shijia->where("rands='" . I("post.id") . "'")->find();

        if (I("post.zffs") == 0) {

            if ($_POST['yzm'] == $_SESSION['yzm']) {
                $shijia = M("ybj");
                $shijia->create();
                $shijia->ybid = $info['ybid'];
                $shijia->zhuangtai = 1;
                if ($shijia->save()) {
                    $_SESSION['yzm'] = "";
                    $_SESSION['tel'] = "";
                    $user = M("user");
                    $wxmbs = $user->where("role4=1")->select();
                    if ($wxmbs) {
                        foreach ($wxmbs as $row) {

                            $this->wxmb($info['xm'], $info['sj'], "有新的钣金喷漆预约订单", $row['openid']);
                        }
                    }
                    $this->success("预约成功", "index");
                } else {
                    $this->error("预约失败");
                }
            } else {
                $this->error("验证码错误，请重新输入");
            }
        } elseif (I("post.zffs") == 1) {
            $user = M("user");
            $wxmbs = $user->where("role2=1")->select();
            if ($wxmbs) {
                foreach ($wxmbs as $row) {
                    $this->wxmb($info['xm'], $info['sj'], "有新的钣金喷漆预约订单", $row['openid']);
                }
            }
            $this->success("正在跳转", "../Wxpay/index?id=" . $info['ybid'] . "&type=bj", 1);
        } else {
            $this->error("请选择付款方式");
        }
    }

    function yzcode2()
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $shijia = M("by");
        $info = $shijia->where("rands='" . I("post.id") . "'")->find();

        if (I("post.zffs") == 0) {

            if ($_POST['yzm'] == $_SESSION['yzm']) {
                $shijia = M("by");
                $shijia->create();
                $shijia->ybid = $info['ybid'];
                $shijia->zhuangtai = 1;
                if ($shijia->save()) {
                    $_SESSION['yzm'] = "";
                    $_SESSION['tel'] = "";
                    $user = M("user");
                    $wxmbs = $user->where("role2=1")->select();
                    if ($wxmbs) {
                        foreach ($wxmbs as $row) {

                            $this->wxmb($info['xm'], $info['sj'], "有新的保养预约订单", $row['openid']);
                        }
                    }
                    $this->success("预约成功", "index");
                } else {
                    $this->error("预约失败");
                }
            } else {
                $this->error("验证码错误，请重新输入");
            }
        } elseif (I("post.zffs") == 1) {
            $user = M("user");
            $wxmbs = $user->where("role2=1")->select();
            if ($wxmbs) {
                foreach ($wxmbs as $row) {

                    $this->wxmb($info['xm'], $info['sj'], "有新的保养预约订单", $row['openid']);
                }
            }
            $this->success("正在跳转", "../Wxpay/index?id=" . $info['ybid'] . "&type=by", 1);
        } else {
            $this->error("请选择付款方式");
        }

    }

    function che($id)
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $_SESSION['sum'] = 0;
        $_SESSION['lingjian'] = "";
        $this->assign("id", $id);
        $this->display();
    }

    function sum($num, $id)
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        if ($num == 1) {
            $num = "qbxg";
        }
        if ($num == 2) {
            $num = "fdjcg";
        }
        if ($num == 3) {
            $num = "zqyzb";
        }
        if ($num == 4) {
            $num = "yqyzb";
        }
        if ($num == 5) {
            $num = "zddb";
        }
        if ($num == 6) {
            $num = "yddb";
        }
        if ($num == 7) {
            $num = "zfgj";
        }
        if ($num == 8) {
            $num = "yfgj";
        }
        if ($num == 9) {
            $num = "zqm";
        }
        if ($num == 10) {
            $num = "yqm";
        }
        if ($num == 11) {
            $num = "cd";
        }
        if ($num == 12) {
            $num = "zhm";
        }
        if ($num == 13) {
            $num = "yhm";
        }
        if ($num == 14) {
            $num = "xlxg";
        }
        if ($num == 15) {
            $num = "zhyzb";
        }
        if ($num == 16) {
            $num = "yhyzb";
        }
        if ($num == 17) {
            $num = "hbxg";
        }
        $bjprice = M("bjprice");
        $info = $bjprice->where("did='$id'")->find();
        $_SESSION['sum'] += $info[$num];
        $_SESSION['lingjian'] = $_SESSION['lingjian'] . "," . $num;
        echo $_SESSION['sum'];
    }

    function sumdown($num, $id)
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        if ($num == 1) {
            $num = "qbxg";
        }
        if ($num == 2) {
            $num = "fdjcg";
        }
        if ($num == 3) {
            $num = "zqyzb";
        }
        if ($num == 4) {
            $num = "yqyzb";
        }
        if ($num == 5) {
            $num = "zddb";
        }
        if ($num == 6) {
            $num = "yddb";
        }
        if ($num == 7) {
            $num = "zfgj";
        }
        if ($num == 8) {
            $num = "yfgj";
        }
        if ($num == 9) {
            $num = "zqm";
        }
        if ($num == 10) {
            $num = "yqm";
        }
        if ($num == 11) {
            $num = "cd";
        }
        if ($num == 12) {
            $num = "zhm";
        }
        if ($num == 13) {
            $num = "yhm";
        }
        if ($num == 14) {
            $num = "xlxg";
        }
        if ($num == 15) {
            $num = "zhyzb";
        }
        if ($num == 16) {
            $num = "yhyzb";
        }
        if ($num == 17) {
            $num = "hbxg";
        }
        $bjprice = M("bjprice");
        $info = $bjprice->where("did='$id'")->find();
        $_SESSION['sum'] -= $info[$num];

        $_SESSION['lingjian'] = str_replace(",$num", "", $_SESSION['lingjian']);
        echo $_SESSION['sum'];
    }

    function wxpay($id)
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $ybj = M("ybj");
        $bjprice = M("bjprice");
        $info = $ybj->where("ybid='$id'")->find();
        $infos = $bjprice->field($info['lingjian'])->where("did='" . $info['did'] . "'")->find();
        $this->assign("infos", $infos);
        $this->display();
    }

    function baoyangdd($id)
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $displacement = M('displacement');
        $infoss = $displacement->table("sw_carbrand carbrand,sw_carmodel carmodel,sw_displacement displacement")->where("carbrand.id=carmodel.bid  and carmodel.mid =displacement.mid and displacement.did='$id' ")->select();


        $_SESSION['bysum'] = 0;
        $_SESSION['bylingjian'] = "";
        $_SESSION['cid'] = array();

        $dc = M("dc");
        $info = $dc->field("componentname")->table("sw_dc dc,sw_component component")->where("dc.cid=component.cid and did='$id'")->group('componentname')->select();
        foreach ($info as $n => $val) {
            $info[$n]['voo'] = $dc->table("sw_dc dc,sw_component component")->where("dc.cid=component.cid and did='$id' and componentname='" . $val['componentname'] . "'")->select();

        }
        $this->assign("info", $info);
        $this->assign("did", $id);
        $this->assign("infos", $infoss[0]);
        $this->display();
    }

    function bysum($cid, $dcid)
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        $_SESSION['bysum'] = 0;
        $dc = M("dc");
        if ($dcid != 0) {
            $_SESSION['cid'][$cid] = $dcid;
            $aaa = array_values($_SESSION['cid']);
            for ($i = 0; $i < count($_SESSION['cid']); $i++) {
                $infos = $dc->where(" dcid='$aaa[$i]'")->find();
                $_SESSION['bysum'] += $infos['dcprice'];
            }
            echo $_SESSION['bysum'];
        } else {
            unset($_SESSION['cid'][$cid]);
            $aaa = array_values($_SESSION['cid']);
            for ($i = 0; $i < count($_SESSION['cid']); $i++) {
                $infos = $dc->where(" dcid='$aaa[$i]'")->find();
                $_SESSION['bysum'] += $infos['dcprice'];
            }
            echo $_SESSION['bysum'];
        }
    }

    function href($type)
    {
        if (!session("?openid")) {
            $this->redirect('code');
        }
        if ($type == "by") {
            $by = M("by");
            $info = $by->where("rands='" . $_SESSION['rands'] . "'")->find();
            $_SESSION['rands'] = "";
            $by->create();
            $by->ybid = $info['ybid'];
            $by->zhuangtai = 2;
            if ($by->save()) {
                $this->success("支付成功", "index");
            } else {
                $this->error("支付成功，但是因为网络问题，写入失败，请联系管理员", "index");
            }
        } elseif ($type == "bj") {
            $by = M("ybj");
            $info = $by->where("rands='" . $_SESSION['rands'] . "'")->find();
            $_SESSION['rands'] = "";
            $by->create();
            $by->ybid = $info['ybid'];
            $by->zhuangtai = 2;
            if ($by->save()) {
                $this->success("支付成功", "index");
            } else {
                $this->error("支付成功，但是因为网络问题，写入失败，请联系管理员", "index");
            }

        } else {
            $this->error("支付失败", "code");
        }
    }
/*
    function wxmb($xm, $sj, $msg, $openid)
    {

        $wxt = $this->taken();
        $url = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=' . $wxt;//access_token改成你的有效值
        $data = array(
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
        $template_msg = array('touser' => $openid, 'template_id' => 'rgniXGgOKGPyN7TVDlqg8hMllVc11V1lPiXFtqpjxPg', 'topcolor' => '#FF0000', 'data' => $data);
        $curl = curl_init($url);
        $header = array();
        $header[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
// 不输出header头信息
        curl_setopt($curl, CURLOPT_HEADER, 0);
// 伪装浏览器
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36');
// 保存到字符串而不是输出
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, false);
// post数据
        curl_setopt($curl, CURLOPT_POST, 1);
// 请求数据
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($template_msg));
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
//        echo $response->errmsg;
    }
	
	
	*/
	
	
	function wxmb($xm, $sj, $msg, $openid)
    {

        $wxt = $this->taken();
        $url = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=' . $wxt;//access_token改成你的有效值
        $data = array(
            'first' => array(
                'value' => $msg,
                'color' => '#FF0000'
            ),
            'keyword1' => array(
                'value' => $msg,
                'color' => '#FF0000'
            ),
            'keyword2' => array(
                'value' => $sj,
                'color' => '#FF0000'
            ),
           
            'remark' => array(
                'value' => '请您及时到后台查看处理',
                'color' => '#FF0000'
            )
        );
        $template_msg = array('touser' => $openid, 'template_id' => 'd23D8duHr4cMuCgczqMp9zPW3sb-VttgM-T4aBBgH8w', 'topcolor' => '#FF0000', 'data' => $data);
        $curl = curl_init($url);
        $header = array();
        $header[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
// 不输出header头信息
        curl_setopt($curl, CURLOPT_HEADER, 0);
// 伪装浏览器
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36');
// 保存到字符串而不是输出
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, false);
// post数据
        curl_setopt($curl, CURLOPT_POST, 1);
// 请求数据
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($template_msg));
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
		//var_dump($response);
       echo $response->errmsg;
    }
	

    function orderlist2()
    {
        $shijia = M("shijia");
        $info = $shijia->where("openid='" . $_SESSION['openid'] . "'")->order("yid desc")->select();
        $this->assign("info", $info);
        $this->display();
    }

    function orderlist3()
    {
        $shijia = M("by");
        $info = $shijia->where("openid='" . $_SESSION['openid'] . "'")->order("ybid desc")->select();
        $this->assign("info", $info);
        $this->display();
    }
    function orderlist4()
    {
        $shijia = M("wx");
        $info = $shijia->where("openid='" . $_SESSION['openid'] . "'")->order("wid desc")->select();
        $this->assign("info", $info);
        $this->display();
    }
    function orderlist5()
    {
        $shijia = M("ybj");
        $info = $shijia->where("openid='" . $_SESSION['openid'] . "'")->order("ybid desc")->select();
        $this->assign("info", $info);
        $this->display();
    }

    function xiangqing2($yid)
    {
        $displacement = M('displacement');
        $info = $displacement->table("sw_carbrand carbrand,sw_carmodel carmodel,sw_displacement displacement, sw_shijia shijia")->where("carbrand.id=carmodel.bid  and carmodel.mid =displacement.mid and displacement.did=shijia.did and shijia.yid=$yid ")->find();
        $this->assign("info", $info);
        $this->display();
    }

    function xiangqing3($yid)
    {
        $displacement = M('displacement');
        $info = $displacement->table("sw_carbrand carbrand,sw_carmodel carmodel,sw_displacement displacement, sw_by bys")->where("carbrand.id=carmodel.bid  and carmodel.mid =displacement.mid and displacement.did=bys.did and bys.ybid=$yid ")->find();
        $this->assign("info", $info);
        $this->display();
    }
    function xiangqing4($wid)
    {
        $displacement = M('displacement');
        $info = $displacement->table("sw_carbrand carbrand,sw_carmodel carmodel,sw_displacement displacement, sw_wx wx")->where("carbrand.id=carmodel.bid  and carmodel.mid =displacement.mid and displacement.did=wx.did and wx.wid=$wid ")->find();
        $this->assign("info", $info);
        $this->display();
    }
    function xiangqing5($ybid)
    {
        $displacement = M('displacement');
        $info = $displacement->table("sw_carbrand carbrand,sw_carmodel carmodel,sw_displacement displacement, sw_ybj ybj")->where("carbrand.id=carmodel.bid  and carmodel.mid =displacement.mid and displacement.did=ybj.did and ybj.ybid=$ybid ")->find();
        $this->assign("info", $info);
        $this->display();
    }

    function qx2($yid)
    {
        $shijia = M("shijia");
        $info = $shijia->where("yid=$yid")->find();
        if ($info && $info['zhuangtai'] != 99 && $info['zhuangtai'] != 4) {


            $shijia->create();
            $shijia->yid = $yid;
            $shijia->zhuangtai = 4;
            if ($shijia->save()) {
                $this->success("取消预约成功");
            } else {
                $this->error("取消预约失败");
            }
        } else {
            $this->error("订单状态不正确");
        }
    }

    function qx3($yid)
    {
        $bys = M("by");
        $info = $bys->where("ybid=$yid")->find();
        if ($info && $info['zhuangtai'] != 99 && $info['zhuangtai'] != 4) {
            $bys->create();
            $bys->ybid = $yid;
            $bys->zhuangtai = 4;
            if ($bys->save()) {
                $this->success("取消预约成功");
            } else {
                $this->error("取消预约失败");
            }
        } else {
            $this->error("订单状态不正确");
        }
    }
    function qx4($wid)
    {
        $bys = M("wx");
        $info = $bys->where("wid=$wid")->find();
        if ($info && $info['zhuangtai'] != 99 && $info['zhuangtai'] != 4) {
            $bys->create();
            $bys->wid = $wid;
            $bys->zhuangtai = 4;
            if ($bys->save()) {
                $this->success("取消预约成功");
            } else {
                $this->error("取消预约失败");
            }
        } else {
            $this->error("订单状态不正确");
        }
    }
    function qx5($ybid)
    {
        $bys = M("ybj");
        $info = $bys->where("ybid=$ybid")->find();
        if ($info && $info['zhuangtai'] != 99 && $info['zhuangtai'] != 4) {
            $bys->create();
            $bys->ybid = $ybid;
            $bys->zhuangtai = 4;
            if ($bys->save()) {
                $this->success("取消预约成功");
            } else {
                $this->error("取消预约失败");
            }
        } else {
            $this->error("订单状态不正确");
        }
    }

    function sumsdown()
    {

        $rand = rand(100000, 999999);
        $_SESSION['yzm'] = $rand;
        $aaa = (Array)sendSms($_SESSION['tel'], $rand);
        if ($aaa['Code'] == "OK") {
            echo "发送成功";
        }

    }

}