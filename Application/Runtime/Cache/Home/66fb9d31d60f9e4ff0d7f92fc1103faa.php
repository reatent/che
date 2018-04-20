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
			.head{  
				width: 100%;
				height: 250px;
				margin-top: 80px;
				max-width: 1200px;
				
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
				margin-top: -40px;
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
			#a,#b,#c,#d,#f,#g,#h,#j,#k,#l,#m,#n,#o,#q,#r,#s,#w,#x,#y,#z{
				font-size: 20px;
				font-family: "微软雅黑";
				margin: 10px;  
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
			} 
			.lg1{
				position: relative;
				left: 10px;
				padding: 10px;
				height: 10%;
				float: left;
				margin-right: 20px;
			}
		</style>
	</head>
	<body>
		<div class="title">

			<div class="ti3">
			<font>选择品牌</font>
			</div>
			<div class="ti1">
				<a href="/web/haval/index.php/Home/Index/code.html"><img src="/web/haval/Public/Home/img/home.png" /></a>
			</div>
		</div>
		<div class="head">
		<div class="d1"><a href="#a">A</a></div>
		<div class="d1"><a href="#b">B</a></div>
		<div class="d1"><a href="#c">C</a></div>
		<div class="d1"><a href="#d">D</a></div> 
		<div class="d1"><a href="#f">F</a></div>
		<div class="d1"><a href="#g">G</a></div>
		<div class="d1"><a href="#h">H</a></div> 
		<div class="d1"><a href="#j">J</a></div>
		<div class="d1"><a href="#k">K</a></div>
		<div class="d1"><a href="#l">L</a></div>
		<div class="d1"><a href="#m">M</a></div>
		<div class="d1"><a href="#n">N</a></div>
		<div class="d1"><a href="#o">O</a></div> 
		<div class="d1"><a href="#q">Q</a></div>
		<div class="d1"><a href="#r">R</a></div>
		<div class="d1"><a href="#s">S</a></div>
		<div class="d1"><a href="#w">W</a></div>
		<div class="d1"><a href="#x">X</a></div>
		<div class="d1"><a href="#y">Y</a></div>
		<div class="d1"><a href="#z">Z</a></div>
		</div> 
		
		<div class="main">
		<ul>
<?php if(is_array($orderinfo)): $i = 0; $__LIST__ = $orderinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li id="<?php echo (strtolower($vo['firstword'])); ?>"><?php echo ($vo['firstword']); ?> </li>
	<?php if(is_array($vo['voo'])): $i = 0; $__LIST__ = $vo['voo'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2o): $mod = ($i % 2 );++$i;?><div class="li1"onclick="location.href='asdmd2?id=<?php echo ($v2o["id"]); ?>'">
			<div class="lg1">
				<img src="/web/haval/Public/Home/img/<?php echo ($v2o["logo"]); ?>" height="40px"/>
			</div>
			<?php echo ($v2o["carname"]); ?>
		</div><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
		


		
		
		</ul>
		</div>
	</body>
</html>