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
    <link rel="icon" type="image/png" href="assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
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
            Amaze UI 文字列表
        </div>
        <ol class="am-breadcrumb">
            <li><a href="#" class="am-icon-home">首页</a></li>
            <li><a href="#">Amaze UI CSS</a></li>
            <li class="am-active">文字列表</li>
        </ol>
        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    <?php echo ($infos["modelname"]); ?>车型的排量-年款列表
                </div>


            </div>
            <div class="tpl-block">

                <div class="am-g">
                    <div class="am-u-sm-12">
                        <form class="am-form">
                            <table class="am-table am-table-striped am-table-hover table-main">
                                <thead>
                                <tr>
                                    <th class="table-check"><input type="checkbox" class="tpl-table-fz-check"></th>
                                    <th class="table-id">ID</th>
                                    <th class="table-title">排量-年款名称</th>
                                    <th class="table-set">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                        <td><input type="checkbox"></td>
                                        <td><?php echo ($i); ?></td>
                                        <td><a href="#"><?php echo ($vo["displacementname"]); ?></a></td>
                                        <td>
                                            <div class="am-btn-toolbar">
                                                <div class="am-btn-group am-btn-group-xs">
                                                    <a href="/web/haval/index.php/Admin/Index/banjinpriceadd?id=<?php echo ($vo["did"]); ?>"
                                                       class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only">
                                                  <span class="am-icon-pencil-square-o"></span>增加/修改价格
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                                </tbody>
                            </table>
                            <div class="am-cf am-pagination tpl-pagination">
                                <?php echo ($page); ?>
                            </div>
                            <hr>

                        </form>
                    </div>

                </div>
            </div>
            <div class="tpl-alert"></div>
        </div>


    </div>

</div>


<script src="/web/haval/Public/Admin/assets/js/jquery.min.js"></script>
<script src="/web/haval/Public/Admin/assets/js/amazeui.min.js"></script>
<script src="/web/haval/Public/Admin/assets/js/app.js"></script>
</body>

</html>