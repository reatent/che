<?php
    if(C('LAYOUT_ON')) {
        echo '{__NOLAYOUT__}';
    }
?>

<a id="href" href="<?php echo($jumpUrl); ?>" style="display: none">跳转</a>  <b id="wait" style="display: none"><?php echo($waitSecond); ?></b>







<!doctype html>
<html lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<link rel="stylesheet" type="text/css" href="__PUBLIC__/404-html/css/main.css">
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
<div id="wrapper"><a class="logo" href="/"></a>
	<div id="main">
		<?php if(isset($message)) {?>

		<header id="header">
			<h1><span class="icon">!</span>:)<span class="sub"><?php echo($message); ?></span></h1>
		</header>
		<?php }else{?>
		<header id="header">
		<h1><span class="icon">!</span>:(<span class="sub"><?php echo($error); ?></span></h1>
		</header>
		<?php }?>
	</div>

</div>
</div>
<script type="text/javascript">
	(function(){
		var wait = document.getElementById('wait'),href = document.getElementById('href').href;
		var interval = setInterval(function(){
			var time = --wait.innerHTML;
			if(time <= 0) {
				location.href = href;
				clearInterval(interval);
			};
		}, 1000);
	})();
</script>
</body>
</html>

