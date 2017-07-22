<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
<meta name="author" content="蓝门索引后台管理系统" />
<meta name="description" content="蓝门索引后台管理系统" />
<meta name="keywords" content="" />
<meta name="application-name" content="蓝门索引后台管理系统 " />
<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- Force IE9 to render in normal mode -->
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<title></title>
<link rel="stylesheet" href="/www.hospital.com/Public/Admin/js/jquery-ui-1.9.2/themes/base/jquery-ui.css" />

	
<!-- Core stylesheets do not remove -->
<link id="bootstrap" href="/www.hospital.com/Public/Admin/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="/www.hospital.com/Public/Admin/css/bootstrap/bootstrap-theme.css" rel="stylesheet" type="text/css" />
<link href="/www.hospital.com/Public/Admin/css/supr-theme/jquery.ui.supr.css" rel="stylesheet" type="text/css"/>
<link href="/www.hospital.com/Public/Admin/css/icons.css" rel="stylesheet" type="text/css" />


<link href="/www.hospital.com/Public/Admin/plugins/misc/qtip/jquery.qtip.css" rel="stylesheet" type="text/css" />
<link href="/www.hospital.com/Public/Admin/plugins/forms/uniform/uniform.default.css" type="text/css" rel="stylesheet" />
<link href="/www.hospital.com/Public/Admin/plugins/forms/select/select2.css" type="text/css" rel="stylesheet" />
<link href="/www.hospital.com/Public/Admin/plugins/forms/togglebutton/toggle-buttons.css" type="text/css" rel="stylesheet" />

<!-- Main stylesheets -->
<link href="/www.hospital.com/Public/Admin/css/main.css" rel="stylesheet" type="text/css" /> 

<!-- Custom stylesheets ( Put your own changes here ) -->
<link href="/www.hospital.com/Public/Admin/css/custom.css" rel="stylesheet" type="text/css" /> 

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="/www.hospital.com/Public/Admin/images/favicon.ico" />

    <link rel="stylesheet" href="/www.hospital.com/Public/Admin/css/Common.css" />

<!--<![endif]-->


</head>
<body>
	
	<!-- loading animation -->
    <div id="qLoverlay"></div>
    <div id="qLbar"></div>
        
    <div id="header">
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo U('Sales/index');?>">禅修.<span class="slogan">后台管理系统</span></a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".avbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon16 icomoon-icon-arrow-4"></span>
                </button>
            </div> 
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-right usernav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="icon16 icomoon-icon-bell"></span><span class="notification">
                        </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="menu">
                                <ul class="notif">
                                    <li class="header"><strong>您有</strong><b class="redinfo marg2info">(<?php
 echo getNote('Order', 1)+getNote('Order', 6) ?>)</b>条未读消息</li>
                                    <li>
                                        <a href="<?php echo U('Order/index');?>">
                                            <span class="icon"><span class="icon16 icomoon-icon-new"></span></span>
                                            <span class="event">有<b class="redinfo marg2info">
                                                <?php echo getNote('order', 1); ?>
                                            </b>个新订单</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo U('Order/index');?>">
                                            <span class="icon"><span class="icon16  icomoon-icon-cart-remove-2"></span></span>
                                            <span class="event">取消交易申请<b class="redinfo marg2info">
                                                <?php echo getNote('order', 6) ?>
                                            </b></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
                            <img src="/www.hospital.com/Public/Admin/images/apple-touch-icon-57-precomposed.png" alt="" class="image" />
                            <span class="txt" id="mastername"><?php echo ($_SESSION['shop']['name']); ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="menu">
                                <ul>
                                    <li><a href="<?php echo U('Login/modify');?>"><span class="icon16 icomoon-icon-cog"></span>修改密码</a></li>
                                    <?php if($_SESSION['shop']['shop_id']==0){ echo "<li><a href=".U('Login/registeruser')."><span class=\"icon16 icomoon-icon-user-plus\"></span>注册</a></li>"; } ?>
                                    <li><a href="<?php echo U('Login/logout');?>"><span class="icon16 icomoon-icon-exit"></span>退出</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.nav-collapse -->
        </nav><!-- /navbar --> 
    </div><!-- End #header -->


	<div id="wrapper">
    
        <!--Responsive navigation button-->
        <div class="resBtn">
            <a href="#"><span class="icon16 minia-icon-list-3"></span></a>
        </div>

        <!--Left Sidebar collapse button-->
        <div class="collapseBtn leftbar">
            <a href="#" class="tipR" title="隐藏左边栏"><span class="icon12 minia-icon-layout"></span></a>
        </div>

        <!--Sidebar background-->
        <div id="sidebarbg"></div>
        <!--Sidebar content-->
        <div id="sidebar">
            <div class="sidenav">
                <div class="sidebar-widget" style="margin: -1px 0 0 0;">
                    <h5 class="title" style="margin-bottom:0">菜 单</h5>
                </div><!-- End .sidenav-widget -->
                <div class="mainnav">
                    <ul>
    <?php $sidebar = sidebar(); if($sidebar && is_array($sidebar)){ foreach($sidebar as $key=>$value){ echo "<li>"; echo '<a href="'.U($value[url]).'"><span class="icon16 '.$value['icon'].'"></span>'.$value['name'].'</a>'; if($value['_data']){ echo '<ul class="sub">'; foreach($value['_data'] as $k => $v){ echo '<li><a href="'.U($v[url]).'"><span class="icon16 '.$v['icon'].'"></span>'.$v['name'].'</a></li>'; } echo "</ul>"; } echo "</li>"; } } ?>
</ul>

                </div>
            </div><!-- End sidenav -->
        </div><!-- End #sidebar -->
    

    
    <div id="content" class="clearfix">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="javascript:;" data-toggle="tab">菜单列表</a>
            </li>
            <li>
                <a href="javascript:;" onclick="add()">添加菜单</a>
            </li>
        </ul>
<form action="<?php echo U('Admin/Nav/order');?>" method="post">
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <table class="table table-striped table-bordered table-hover table-condensed">
                <tr>
                    <th width="5%">排序</th>
                    <th>菜单名</th>
                    <th>连接</th>
                    <th>操作</th>
                </tr>
                <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
                        <td>
                            <input class="form-control" style="width:40px;height:25px;" type="text" name="<?php echo ($v['id']); ?>" value="<?php echo ($v['order_number']); ?>">
                        </td>
                        <td><?php echo ($v['_name']); ?></td>
                        <td><?php echo ($v['url']); ?></td>
                        <td>
                            <a href="javascript:;" navId="<?php echo ($v['id']); ?>" navName="<?php echo ($v['name']); ?>"  onclick="add_child(this)">添加子菜单</a> |
                            <a href="javascript:;" navId="<?php echo ($v['id']); ?>" navName="<?php echo ($v['name']); ?>" navMca="<?php echo ($v['url']); ?>"  onclick="edit(this)">修改</a> |
                            <a href="javascript:" navId="<?php echo ($v['id']); ?>" onclick="del(this)">删除</a>
                        </td>
                    </tr><?php endforeach; endif; ?>
                <tr>
                    <th>
                        <button type="submit" class="btn btn-info">排序</button>
                    </th>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
</form>
<!-- 添加菜单模态框开始 -->
<div class="modal fade" id="wcs-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    添加菜单
                </h4>
            </div>
            <div class="modal-body">
                <form id="wcs-form" class="form-inline" action="<?php echo U('Admin/Nav/add');?>" method="post">
                    <input type="hidden" name="pid" value="0">
                    <table class="table table-striped table-bordered table-hover table-condensed">
                        <tr class="text-center">
                            <th width="16%">菜单名:</th>
                            <td>
                                <input class="form-control" type="text" name="name">
                            </td>
                        </tr>
                        <tr>
                            <th>连接:</th>
                            <td>
                                <input class="form-control" type="text" name="url"> 输入模块/控制器/方法即可 例如 Admin/Nav/index
                            </td>
                        </tr>

                        <tr>
                            <th></th>
                            <td>
                                <button type="submit" class="btn btn-success">添加</button>
                                <button type="button" class="btn btn-info"  data-dismiss="modal" aria-hidden="true">
                                    取消
                                </button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- 添加菜单模态框结束 -->

<!-- 修改菜单模态框开始 -->
<div class="modal fade" id="wcs-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    修改菜单
                </h4>
            </div>
            <div class="modal-body">
                <form id="wcs-form" class="form-inline" action="<?php echo U('Admin/Nav/edit');?>" method="post">
                    <input type="hidden" name="id">
                    <table class="table table-striped table-bordered table-hover table-condensed">
                        <tr class="text-center">
                            <th width="15%">菜单名：</th>
                            <td>
                                <input class="form-control" type="text" name="name">
                            </td>
                        </tr>
                        <tr>
                            <th>连接：</th>
                            <td>
                                <input class="form-control" type="text" name="url"> 输入模块/控制器/方法即可 例如 Admin/Nav/index
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <button type="submit" class="btn btn-success">修改</button>
                                <button type="button" class="btn btn-info"  data-dismiss="modal" aria-hidden="true">
                                    取消
                                </button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
        <!-- 修改菜单模态框结束 -->

        <!-- 删除菜单模态框开始 -->
        <div class="modal fade" id="wcs-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                        <h4 class="modal-title" id="myModalLabel">
                            删除菜单
                        </h4>
                    </div>
                    <div class="modal-body">
                        <form id="wcs-form" class="form-inline" action="">
                            <table class="table table-striped table-bordered table-hover table-condensed">
                                <tr>
                                    <td></td>
                                    <td>
                                        <button type="submit" class="btn btn-success">删除</button>
                                        <button type="button" class="btn btn-info"  data-dismiss="modal" aria-hidden="true">
                                            取消
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- 删除菜单模态框结束 -->
    </div>

</div><!-- End #wrapper -->
	<script type="text/javascript" src="/www.hospital.com/Public/Admin/js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="/www.hospital.com/Public/Admin/js/form-master/jquery.form.js"></script>
<script type="text/javascript" src="/www.hospital.com/Public/Admin/js/bootstrap/bootstrap.min.js"></script>
<script src="/www.hospital.com/Public/Admin/js/jquery-ui-1.9.2/ui/minified/jquery-ui.min.js"></script>
<script src="/www.hospital.com/Public/Admin/js/common.js"></script>
<!-- Load modernizr first -->
<script type="text/javascript" src="/www.hospital.com/Public/Admin/js/libs/modernizr.js"></script>

<!-- <script type="text/javascript" src="/www.hospital.com/Public/Admin/js/bootstrap/bootstrap.js"></script> -->
<script type="text/javascript" src="/www.hospital.com/Public/Admin/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="/www.hospital.com/Public/Admin/js/libs/jRespond.min.js"></script>

<!-- Charts plugins -->
<script type="text/javascript" src="/www.hospital.com/Public/Admin/plugins/charts/sparkline/jquery.sparkline.min.js"></script><!-- Sparkline plugin -->

<!-- Misc plugins -->
<script type="text/javascript" src="/www.hospital.com/Public/Admin/plugins/misc/qtip/jquery.qtip.min.js"></script>
<!-- Custom tooltip plugin -->
<script type="text/javascript" src="/www.hospital.com/Public/Admin/plugins/misc/totop/jquery.ui.totop.min.js"></script>

<!-- Search plugin -->
<script type="text/javascript" src="/www.hospital.com/Public/Admin/plugins/misc/search/tipuesearch_set.js"></script>
<script type="text/javascript" src="/www.hospital.com/Public/Admin/plugins/misc/search/tipuesearch_data.js"></script>
<!-- JSON for searched results -->
<script type="text/javascript" src="/www.hospital.com/Public/Admin/plugins/misc/search/tipuesearch.js"></script>

<!-- Form plugins -->
<script type="text/javascript" src="/www.hospital.com/Public/Admin/plugins/forms/uniform/jquery.uniform.min.js"></script>
<script type="text/javascript" src="/www.hospital.com/Public/Admin/plugins/forms/select/select2.min.js"></script>
<script type="text/javascript" src="/www.hospital.com/Public/Admin/plugins/forms/togglebutton/jquery.toggle.buttons.js"></script>

<!-- Init plugins -->
<script type="text/javascript" src="/www.hospital.com/Public/Admin/js/main.js"></script><!-- Core js functions -->


<script>
    // 添加菜单
    function add(){
        $("input[name='name'],input[name='url']").val('');
        $("input[name='pid']").val(0);
        $('#wcs-add').modal('show');
    }

    // 添加子菜单
    function add_child(obj){
        var navId=$(obj).attr('navId');
        $("input[name='pid']").val(navId);
        $("input[name='name']").val('');
        $("input[name='url']").val('');
        $('#wcs-add').modal('show');
    }

    // 修改菜单
    function edit(obj){
        var navId=$(obj).attr('navId');
        var navName=$(obj).attr('navName');
        var navMca=$(obj).attr('navMca');
        //alert(navMca);
        $("input[name='id']").val(navId);
        $("input[name='name']").val(navName);
        $("input[name='url']").val(navMca);
        $('#wcs-edit').modal('show');
    }

    // 删除
    function del(obj){
        var navId=$(obj).attr('navId');
        $('#wcs-delete').modal('show');
        var url = "<?php echo U('Admin/Nav/delete');?>";
        var newUrl = url.replace(/\.html$/, "")+"/id/"+navId;
        $('#wcs-delete').find('form').attr('action', newUrl);
        $('#wcs-delete').modal('show');
        console.log(newUrl);
    }

</script>




</body>
</html>