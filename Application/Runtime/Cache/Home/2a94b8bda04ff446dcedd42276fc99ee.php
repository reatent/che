<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head> 
		<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
		<title>Home</title>
		<style>  
			a{
				color: white;
				text-decoration: none;
			}
			.title{ 
				margin: 0 auto;
			    max-width: 720px;
  				width: 100%;
				margin-left: -8px;
				position: fixed;
				top: 0; 
				height: 45px;  
				border-bottom: 1px solid #dcdcdc;
				background-color: white;
				line-height: 45px;
				font-size: 17px;
				float: left;
				z-index: 999;   
				text-align: center;
			}
			.bd{
				max-width: 750px;
			}
			div{
				float: left;
			}
			.t1{
				position: relative;
				left: 15px;
			} 
			.t2{
				position: absolute;
				right: 15px; 
				top: 5px;
			} 
			.smsj{  
				margin-top: 50px; 
				width: 100%;
				height:100px;
				text-align: center;
				line-height: 100px;
				font-size:40px;
				font-family: "微软雅黑";
				max-width: 720px;
				background-color: lightblue;
			}
			.ddsj{  
				margin-top: 10px; 
				width: 100%;
				height:100px;
				text-align: center;
				line-height: 100px;
				font-size:40px;
				font-family: "微软雅黑";
				max-width: 720px;
				background-color: lightgreen;
			}  
			.main{
				width: 100%;
				max-width: 710px;
			}
		</style>
	</head>
	<body>  
		<div class="title">
			 
			<div class="t1">
				
			</div> 
			 养护汽车  
			<div class="t1">

			</div>
		</div>
		
		<div class="main">
		<div class="smsj">
			<a href="/web/haval/index.php/Home/Index/logo2?shijia=1">上门试驾</a>
		</div>
			<div class="ddsj">
			<a href="/web/haval/index.php/Home/Index/logo2?shijia=0">到店试驾</a>
		</div>

		
		<div class="ddsj"style="background-color: lightpink;">
			<a href="/web/haval/index.php/Home/Index/logo4?bytype=1">到店汽车保养</a>
		</div>
			<div class="ddsj"style="background-color: lightpink;">
			<a href="/web/haval/index.php/Home/Index/logo4?bytype=0">上门汽车保养</a>
		</div>

		
		<div class="ddsj"style="background-color: lightcoral;">
			<a href="/web/haval/index.php/Home/Index/logo5?zl=1">本店车辆维修</a>
		</div>
			<div class="ddsj"style="background-color: lightcoral;">
			<a href="/web/haval/index.php/Home/Index/logo5?zl=0">其他车辆维修</a>
		</div>
		
		<div class="ddsj"style="background-color: lightsalmon;">
			<a href="/web/haval/index.php/Home/Index/logo3.html">钣金喷漆</a>
		</div>
		</div>
		<div class="ddsj">
			<a href="/web/haval/index.php/Home/Index/userorder">预约查询</a>
		</div>
		</div>
	</body>
</html>