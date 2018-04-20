<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amaze UI Admin index Examples</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="icon" type="/web/haval/Public/Admin/image/png" href="assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/web/haval/Public/Admin/assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="stylesheet" href="/web/haval/Public/Admin/assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/web/haval/Public/Admin/assets/css/admin.css">
    <link rel="stylesheet" href="/web/haval/Public/Admin/assets/css/app.css">
</head>
<body data-type="generalComponents">


<header class="am-topbar am-topbar-inverse admin-header">
    <div class="am-topbar-brand">
        <a href="javascript:;" class="tpl-logo">
            <img src="/web/haval/Public/Admin/assets/img/logo.png" alt="">
        </a>
    </div>
    <div class="am-icon-list tpl-header-nav-hover-ico am-fl am-margin-right">

    </div>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only"
            data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span
            class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list tpl-header-list">
            <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen" class="tpl-header-list-link"><span
                    class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>

            <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
                <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">
                    <span class="tpl-header-list-user-nick">禁言小张</span><span class="tpl-header-list-user-ico"> <img
                        src="/web/haval/Public/Admin/assets/img/user01.png"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="#"><span class="am-icon-bell-o"></span> 资料</a></li>
                    <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
                    <li><a href="#"><span class="am-icon-power-off"></span> 退出</a></li>
                </ul>
            </li>
            <li><a href="###" class="tpl-header-list-link"><span
                    class="am-icon-sign-out tpl-header-list-ico-out-size"></span></a></li>
        </ul>
    </div>
</header>


<div class="tpl-page-container tpl-page-header-fixed">
    <div class="tpl-left-nav tpl-left-nav-hover">
    <div class="tpl-left-nav-title">
        Amaze UI 列表
    </div>
    <div class="tpl-left-nav-list">
        <ul class="tpl-left-nav-menu">
            <li class="tpl-left-nav-item">
                <a href="/web/haval/index.php/Admin/Index/form-amazeui.html" class="nav-link">
                    <i class="am-icon-home"></i>
                    <span>首页</span>
                </a>
            </li>
			 <li class="tpl-left-nav-item">
                <a href="/web/haval/index.php/Admin/Index/userlist.html" class="nav-link">
                    <i class="am-icon-home"></i>
                    <span>管理员管理</span>
                </a>
            </li>
            <li class="tpl-left-nav-item">
                <!-- 打开状态 a 标签添加 active 即可   -->
                <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                    <i class="am-icon-wpforms"></i>
                    <span>车辆管理</span>
                    <!-- 列表打开状态的i标签添加 tpl-left-nav-more-ico-rotate 图表即90°旋转  -->
                    <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right tpl-left-nav-more-ico-rotate"></i>
                </a>
                <!-- 打开状态 添加 display:block-->
                <ul class="tpl-left-nav-sub-menu" style="display: block;">
                    <li>
                        <!-- 打开状态 a 标签添加 active 即可   -->
                        <a href="/web/haval/index.php/Admin/Index/form-amazeui.html">
                            <i class="am-icon-angle-right"></i>
                            <span>品牌增加</span>
                            <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                        </a>

                        <a href="/web/haval/index.php/Admin/Index/brondlist.html">
                            <i class="am-icon-angle-right"></i>
                            <span>品牌列表</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="tpl-left-nav-item">
                <!-- 打开状态 a 标签添加 active 即可   -->
                <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                    <i class="am-icon-wpforms"></i>
                    <span>零件管理</span>
                    <!-- 列表打开状态的i标签添加 tpl-left-nav-more-ico-rotate 图表即90°旋转  -->
                    <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right tpl-left-nav-more-ico-rotate"></i>
                </a>
                <!-- 打开状态 添加 display:block-->
                <ul class="tpl-left-nav-sub-menu" style="display: block;">
                    <li>
                        <!-- 打开状态 a 标签添加 active 即可   -->
                        <a href="/web/haval/index.php/Admin/Index/addcomponents.html">
                            <i class="am-icon-angle-right"></i>
                            <span>零件种类增加</span>
                            <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                        </a>

                        <a href="/web/haval/index.php/Admin/Index/brondlist2.html">
                            <i class="am-icon-angle-right"></i>
                            <span>查看/增加零件</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="tpl-left-nav-item">
                <!-- 打开状态 a 标签添加 active 即可   -->
                <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                    <i class="am-icon-wpforms"></i>
                    <span>预约管理</span>
                    <!-- 列表打开状态的i标签添加 tpl-left-nav-more-ico-rotate 图表即90°旋转  -->
                    <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right tpl-left-nav-more-ico-rotate"></i>
                </a>
                <!-- 打开状态 添加 display:block-->
                <ul class="tpl-left-nav-sub-menu" style="display: block;">
                    <li>
                        <!-- 打开状态 a 标签添加 active 即可   -->
                        <a href="/web/haval/index.php/Admin/Index/shijiayuyue.html">
                            <i class="am-icon-angle-right"></i>
                            <span>试驾预约</span>
                            <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                        </a>
                    </li>
                    <li>
                        <!-- 打开状态 a 标签添加 active 即可   -->
                        <a href="/web/haval/index.php/Admin/Index/baoyangyuyue.html">
                            <i class="am-icon-angle-right"></i>
                            <span>保养预约</span>
                            <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                        </a>
                    </li>
					 <li>
                        <!-- 打开状态 a 标签添加 active 即可   -->
                        <a href="/web/haval/index.php/Admin/Index/weixiuyuyue.html">
                            <i class="am-icon-angle-right"></i>
                            <span>维修预约</span>
                            <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="tpl-left-nav-item">
                <!-- 打开状态 a 标签添加 active 即可   -->
                <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                    <i class="am-icon-wpforms"></i>
                    <span>钣金喷漆管理</span>
                    <!-- 列表打开状态的i标签添加 tpl-left-nav-more-ico-rotate 图表即90°旋转  -->
                    <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right tpl-left-nav-more-ico-rotate"></i>
                </a>
                <!-- 打开状态 添加 display:block-->
                <ul class="tpl-left-nav-sub-menu" style="display: block;">
                    <li>
                        <!-- 打开状态 a 标签添加 active 即可   -->
                        <a href="/web/haval/index.php/Admin/Index/brondlist3">
                            <i class="am-icon-angle-right"></i>
                            <span>价格设置</span>
                            <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                        </a>

                        <a href="/web/haval/index.php/Admin/Index/bjyuyue.html">
                            <i class="am-icon-angle-right"></i>
                            <span>钣金喷漆预约</span>
                            <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="tpl-left-nav-item">
                <!-- 打开状态 a 标签添加 active 即可   -->
                <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                    <i class="am-icon-wpforms"></i>
                    <span>验证管理</span>
                    <!-- 列表打开状态的i标签添加 tpl-left-nav-more-ico-rotate 图表即90°旋转  -->
                    <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right tpl-left-nav-more-ico-rotate"></i>
                </a>
                <!-- 打开状态 添加 display:block-->
                <ul class="tpl-left-nav-sub-menu" style="display: block;">
                    <li>
                        <!-- 打开状态 a 标签添加 active 即可   -->
                        <a href="/web/haval/index.php/Admin/Index/yanzheng">
                            <i class="am-icon-angle-right"></i>
                            <span>订单验证</span>
                            <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                        </a>

                        <a href="/web/haval/index.php/Admin/Index/tuikuan.html">
                            <i class="am-icon-angle-right"></i>
                            <span>退款</span>
                            <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                        </a>
                    </li>
                </ul>
            </li>




        </ul>
    </div>
</div>

    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            Amaze UI 表单
        </div>
        <ol class="am-breadcrumb">
            <li><a href="#" class="am-icon-home">首页</a></li>
            <li><a href="#">表单</a></li>
            <li class="am-active">Amaze UI 表单</li>
        </ol>
        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    <span class="am-icon-code"></span> 表单
                </div>
                <div class="tpl-portlet-input tpl-fz-ml">
                    <div class="portlet-input input-small input-inline">
                        <div class="input-icon right">
                            <i class="am-icon-search"></i>
                            <input type="text" class="form-control form-control-solid" placeholder="搜索..."></div>
                    </div>
                </div>


            </div>
            <div class="tpl-block ">

                <div class="am-g tpl-amazeui-form">


                    <div class="am-u-sm-12 am-u-md-9">
                        <form class="am-form am-form-horizontal" method="post" action="/web/haval/index.php/Admin/Index/bjadd">
                            <input type="hidden" name="did" value="<?php echo ($id); ?>">

                            <div class="am-form-group">
                                <label for="user-name"  class="am-u-sm-3 am-form-label">前保险杠</label>
                                <div class="am-u-sm-9">
                                    <input type="text"  name="qbxg" value="<?php echo ($info["qbxg"]); ?>"  >
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-name"  class="am-u-sm-3 am-form-label">发动机舱盖</label>

                                <div class="am-u-sm-9">
                                    <input type="text"  name="fdjcg" value="<?php echo ($info["fdjcg"]); ?>"  >
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-name"  class="am-u-sm-3 am-form-label">左前翼子板</label>

                                <div class="am-u-sm-9">
                                    <input type="text"  name="zqyzb" value="<?php echo ($info["zqyzb"]); ?>">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-name"  class="am-u-sm-3 am-form-label">右前翼子板</label>

                                <div class="am-u-sm-9">
                                    <input type="text"  name="yqyzb" value="<?php echo ($info["yqyzb"]); ?>">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-name"  class="am-u-sm-3 am-form-label">左底大边</label>

                                <div class="am-u-sm-9">
                                    <input type="text"  name="zddb" value="<?php echo ($info["zddb"]); ?>" >
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-name"  class="am-u-sm-3 am-form-label">右底大边</label>

                                <div class="am-u-sm-9">
                                    <input type="text"  name="yddb" value="<?php echo ($info["yddb"]); ?>" >
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-name"  class="am-u-sm-3 am-form-label">左反光镜</label>

                                <div class="am-u-sm-9">
                                    <input type="text"  name="zfgj" value="<?php echo ($info["zfgj"]); ?>">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-name"  class="am-u-sm-3 am-form-label">右反光镜</label>

                                <div class="am-u-sm-9">
                                    <input type="text"  name="yfgj" value="<?php echo ($info["yfgj"]); ?>" >
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-name"  class="am-u-sm-3 am-form-label">左前门</label>

                                <div class="am-u-sm-9">
                                    <input type="text"  name="zqm" value="<?php echo ($info["zqm"]); ?>">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-name"  class="am-u-sm-3 am-form-label">右前门</label>

                                <div class="am-u-sm-9">
                                    <input type="text"  name="yqm" value="<?php echo ($info["yqm"]); ?>" >
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-name"  class="am-u-sm-3 am-form-label">车顶</label>

                                <div class="am-u-sm-9">
                                    <input type="text"  name="cd" value="<?php echo ($info["cd"]); ?>">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-name"  class="am-u-sm-3 am-form-label">左后门</label>

                                <div class="am-u-sm-9">
                                    <input type="text"  name="zhm" value="<?php echo ($info["zhm"]); ?>">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-name"  class="am-u-sm-3 am-form-label">右后门</label>

                                <div class="am-u-sm-9">
                                    <input type="text"  name="yhm" value="<?php echo ($info["yhm"]); ?>">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-name"  class="am-u-sm-3 am-form-label">行李箱盖</label>

                                <div class="am-u-sm-9">
                                    <input type="text"  name="xlxg" value="<?php echo ($info["xlxg"]); ?>">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-name"  class="am-u-sm-3 am-form-label">左后翼子板</label>

                                <div class="am-u-sm-9">
                                    <input type="text"  name="zhyzb" value="<?php echo ($info["zhyzb"]); ?>">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-name"  class="am-u-sm-3 am-form-label">右后翼子板</label>

                                <div class="am-u-sm-9">
                                    <input type="text"  name="yhyzb" value="<?php echo ($info["yhyzb"]); ?>">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-name"  class="am-u-sm-3 am-form-label">后保险杠</label>

                                <div class="am-u-sm-9">
                                    <input type="text"  name="hbxg" value="<?php echo ($info["hbxg"]); ?>">
                                </div>
                            </div>


                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3">
                                    <input type="submit" class="am-btn am-btn-primary" value="提交价格" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>


    </div>

</div>


<script src="/web/haval/Public/Admin/assets/js/jquery.min.js"></script>
<script src="/web/haval/Public/Admin/assets/js/amazeui.min.js"></script>
<script src="/web/haval/Public/Admin/assets/js/app.js"></script>
</body>

</html>