<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head> 
		<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
		<title></title>
		<style>
			a{
				text-decoration: none;
				color: dimgray;
				font-size: 15px;
			}
			body{
				background-color: lightgrey;
			}
			li{
				list-style: none;
			}
			.d1{
				width: 15%;
				height: 30px;
				background-color: whitesmoke;
				border: 1px solid lightslategray;
				border-radius: 5px 5px 5px 5px;
				float: left;
				margin: 7px; 
				text-align: center;
				line-height: 30px;
				font-family: "微软雅黑";  
			} 
			.title{ 
				margin-left: -8px;
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
			
			} 
			.main{ 
				margin-top: 100px;
				margin-left: -46px; 
				max-width: 1200px;
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
			.ti3{
				position: absolute; 
				left: 40%;
				float: left;
			} 
			.li1{
				background-color: white; 
				height: 70px; 
				width: 101%;
				border-top: 1px solid gray;
				border-bottom: 1px solid gray;
				margin-top: -1px; 
				float: left;
				line-height:70px;
				font-size: 20px; 
				font-family: "微软雅黑";
				text-align: center;
			}  
			.name{
				position: absolute;
				top: 65px;
				font-size: 20px;
			}
		</style>
	</head>
	<body>
		<div class="title">
			<div class="ti3">
			<font>选择核验编号</font>
			</div>
			<div class="ti1">
				<a href="/web/haval/index.php/Home/Index/code.html"><img src="/web/haval/Public/Home/img/home.png" /></a>
			</div>
		</div> 

		<div class="main">
			<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="li1"onclick="location.href='xiangqing5?ybid=<?php echo ($vo["ybid"]); ?>'">
			<?php echo ($vo["rands"]); ?>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>

		
		 
		</div>
	</body>
</html>