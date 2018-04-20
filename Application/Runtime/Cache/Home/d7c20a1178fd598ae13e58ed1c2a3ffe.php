<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head> 
		<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
		<title></title>
		<style>
			*{margin: 0;
			padding: 0;}
			body{
				background-color: gainsboro;
			}
			li{
				list-style: none;
			} 
			.title{
				position: fixed;
				top: 0;
				width: 100%;
				height: 50px; 
				background-color: white;
				line-height: 50px;
				font-size: 20px;
				float: left;
				z-index: 1000;
				max-width: 1200px;
				text-align: center;
			}  
			.ti1{
				position: absolute;
				left: 10px;
				top: 8px; 
				float: left; 
			}
			.ti2{
				float: left;
				position: absolute;
				top: 8px;
				right: 20px; 
			}    
			.name{
				position: absolute;
				top: 65px;
				font-size: 20px;
			} 
			.tj{
				margin-top: 10px;
				margin-left: 15px;
				height: 30px;
				width: 40%;
				background-color: gray;
				border: 1px solid gray;
				color: white;
				border-radius: 5px 5px 5px 5px;
			}
			.foot{
				position: fixed;
				width: 100%;
				background-color: whitesmoke; 
				bottom: 0px;
				height: 70px;
				z-index: 1000;
				max-width: 1200px;
			}
			.foot .zj{
				float: left; 
				line-height: 70px;
				font-size: 20px;
				margin-left: 30px;
			}
			.foot input{
				margin-top: 14px;
				margin-right:30px; 
				float: right;
				width: 100px;
				height: 40px;
				background-color: orange;  
				border-radius: 10px 10px 10px 10px;
				border: 1px solid white;
				font-size: 18px; 
				color: white;
			}
			.carn{
				width: 101%;
				margin-left: -8px;
				padding-left: 10px;
				height: 40px;
				line-height: 40px;
				margin-top: 100px;
				background-color: white;
				border-top: 1px solid darkgray;
				border-bottom: 1px solid darkgray;
				max-width: 1200px;
				
			}
			.mright{
				float: left;
				position: absolute;

				width: 100%;
				height: auto;
				border-left: 1px solid darkgray;
				max-width: 750px;
			}
			.mright .mr1:last-child{margin-bottom: 70px;}
			.mr1{
				width: 100%;

				line-height: 40px;
				background-color: white; 
				margin-top: 15px;
			} 
			.mr1t,.mr1b{
				width: 100%;
				height:40px;
				background: #fff;
				border-top: 1px solid darkgray;
			}
			.mr1tl{
				margin-left: 15px;
				float: left;
			}
			.mr1tr{
				float: right;
				font-size: 12px;
				margin-right: 30px;;
			}
			.mr1bl{
				color: gray;
				font-size: 13px;
				margin-left: 15px;
				float: left;
			}
			.mr1br{
				float: right;
				color: gray;
				font-size: 12px;
				margin-right:20px;
			}  
			.tp1{ 
				width: 30px;
				height: 30px; 
				background: url(/web/haval/Public/Home/img/baoyang/mx.png) no-repeat;
				background-size: 85%;
				float: right;  
				margin-top: 8px;
				margin-left: 10px;
			}

			.left{
			float: left;
			width: 25%;
			height:900px;
			margin-left: -9px;
			overflow: visible;
			position: fixed;			
			margin-top: 55px;
			top: 71px;
			}
			.left_ul{
			list-style-type: none;
			width: 100%;
			float: left;
			margin-left: -40px;
			min-height: 300px;
			max-height: 380px;
			overflow:scroll;
			}
			.left_ul::-webkit-scrollbar {display:none}
			.left_li{
			width: 100%;
			height: 60px;
			background-color:gainsboro;
			border-bottom: 1px solid #eeeeee;
			text-align: center;
			}
			.left_li:hover{
			background-color: #ffffff;
			}
			.left_ul a{
			text-decoration: none;
			color: #000000;
			font-size: 12px;
			
			}
			.left_li img{
				vertical-align: middle;
				width: 40%;
				height: 50%;
			}
			.disable{
			display: none;
		}
			.left_li p{ line-height: 60px;}
		</style>
		<script>
			function ft1(cid,dcid,did){
				//创建ajax对象
				var xhr=new XMLHttpRequest();
				//接收请求
				xhr.onreadystatechange=function(){
					if(xhr.readyState==4){
//               alert(xhr.responseText);
						document.getElementById('zjg').innerHTML= xhr.responseText;
					}}
				//创建HTTP请求
				xhr.open('get','/web/haval/index.php/Home/Index/bysum?cid='+cid+'&dcid='+dcid+'&did='+did);
				//发送请求
				xhr.send(null); }


		</script>
	</head>
	<body>
		<div class="title">
			 预约服务
			<div class="ti1">
				<a href="/web/haval/index.php/Home/Index/code.html"><img src="/web/haval/Public/Home/img/home.png" /></a>
			</div>
		</div> 
		<div class="name">预约汽车保养 </div>
		
		<div class="carn">
			<?php echo ($infos['carname']); ?>-<?php echo ($infos['modelname']); ?> -<?php echo ($infos['displacementname']); ?>
		</div>

		<div class="mright">
			<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="mr1" id="jy_con1" style="display:block;">
				<div class="mr1t">
					<div class="mr1tl"><?php echo ($vo["componentname"]); ?></div>
				</div>
				<?php if(is_array($vo['voo'])): $i = 0; $__LIST__ = $vo['voo'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2o): $mod = ($i % 2 );++$i;?><div class="mr1b">
					<div class="mr1bl"><?php echo ($v2o["dcname"]); ?></div><div class="mr1br">￥<?php echo ($v2o["dcprice"]); ?><input type="radio" class="tp1" name="<?php echo ($vo["componentname"]); ?>" id="tp1" onclick="ft1('<?php echo ($v2o["cid"]); ?>','<?php echo ($v2o["dcid"]); ?>')"/></div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
				<div class="mr1b">
					<div class="mr1bl">无需保养</div><div class="mr1br">￥0<input type="radio" class="tp1" name="<?php echo ($vo["componentname"]); ?>" id="tp1" onclick="ft1('<?php echo ($v2o["cid"]); ?>','0','<?php echo ($v2o["did"]); ?>')"/></div>
				</div>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div> 
		
		<div class="foot">
			<div class="zj">总价:<label id="zjg">0</label>元</div>
			<div><input type="submit" id="next" value="下一步" onclick="location.href='yuyue4?did=<?php echo ($did); ?>'"></div>
		</div>
	</body>
</html>