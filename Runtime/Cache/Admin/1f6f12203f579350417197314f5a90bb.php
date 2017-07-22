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
<link rel="stylesheet" href="/hospital/Public/Admin/js/jquery-ui-1.9.2/themes/base/jquery-ui.css" />

	
<!-- Core stylesheets do not remove -->
<link id="bootstrap" href="/hospital/Public/Admin/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="/hospital/Public/Admin/css/bootstrap/bootstrap-theme.css" rel="stylesheet" type="text/css" />
<link href="/hospital/Public/Admin/css/supr-theme/jquery.ui.supr.css" rel="stylesheet" type="text/css"/>
<link href="/hospital/Public/Admin/css/icons.css" rel="stylesheet" type="text/css" />


<link href="/hospital/Public/Admin/plugins/misc/qtip/jquery.qtip.css" rel="stylesheet" type="text/css" />
<link href="/hospital/Public/Admin/plugins/forms/uniform/uniform.default.css" type="text/css" rel="stylesheet" />
<link href="/hospital/Public/Admin/plugins/forms/select/select2.css" type="text/css" rel="stylesheet" />
<link href="/hospital/Public/Admin/plugins/forms/togglebutton/toggle-buttons.css" type="text/css" rel="stylesheet" />

<!-- Main stylesheets -->
<link href="/hospital/Public/Admin/css/main.css" rel="stylesheet" type="text/css" /> 

<!-- Custom stylesheets ( Put your own changes here ) -->
<link href="/hospital/Public/Admin/css/custom.css" rel="stylesheet" type="text/css" /> 

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="/hospital/Public/Admin/images/favicon.ico" />

    <style type="text/css">
    label{

        margin:5px 0 5px 0;
        text-align: center;
    }
    </style>

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
                            <img src="/hospital/Public/Admin/images/apple-touch-icon-57-precomposed.png" alt="" class="image" />
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
<h1 class="text-center">为<span style="color:red"><?php echo ($group_data['title']); ?></span>分配权限</h1>
<form action="" method="post">
	<input type="hidden" name="id" value="<?php echo ($group_data['id']); ?>">
	<table class="table table-striped table-bordered table-hover table-condensed
	">
		<?php if(is_array($rule_data)): foreach($rule_data as $key=>$v): if(empty($v['_data'])): ?><tr class="b-group">
					<th width="13%">
						<label>
							<?php echo ($v['title']); ?>
							<input type="checkbox" name="rule_ids[]" value="<?php echo ($v['id']); ?>" <?php if(in_array($v['id'],$group_data['rules'])): ?>checked="checked"<?php endif; ?> onclick="checkAll(this)" >
						</label>
					</th>
					<td></td>
				</tr>
			<?php else: ?>
				<tr class="b-group">
					<th width="12%">
						<label>
							<?php echo ($v['title']); ?> <input type="checkbox" name="rule_ids[]" value="<?php echo ($v['id']); ?>" <?php if(in_array($v['id'],$group_data['rules'])): ?>checked="checked"<?php endif; ?> onclick="checkAll(this)">
						</label>
					</th>
					<td class="b-child">
						<?php if(is_array($v['_data'])): foreach($v['_data'] as $key=>$n): ?><table class="table table-striped table-bordered table-hover table-condensed">
								<tr class="b-group">
									<th width="12%">
										<label>
											<?php echo ($n['title']); ?> <input type="checkbox" name="rule_ids[]" value="<?php echo ($n['id']); ?>" <?php if(in_array($n['id'],$group_data['rules'])): ?>checked="checked"<?php endif; ?> onclick="checkAll(this)">
										</label>
									</th>
									<td>
										<?php if(!empty($n['_data'])): if(is_array($n['_data'])): $i = 0; $__LIST__ = $n['_data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><label>
													&emsp;<?php echo ($c['title']); ?> <input type="checkbox" name="rule_ids[]" value="<?php echo ($c['id']); ?>" <?php if(in_array($c['id'],$group_data['rules'])): ?>checked="checked"<?php endif; ?> >
												</label><?php endforeach; endif; else: echo "" ;endif; endif; ?>
									</td>
								</tr>
							</table><?php endforeach; endif; ?>
					</td>
				</tr><?php endif; endforeach; endif; ?>
		<tr>
			<th></th>
			<td>
                <button type="submit" class="btn btn-success">提交</button>
            </td>
		</tr>
	</table>
</form>
</div>
    
</div><!-- End #wrapper -->
	<script type="text/javascript" src="/hospital/Public/Admin/js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="/hospital/Public/Admin/js/form-master/jquery.form.js"></script>
<script type="text/javascript" src="/hospital/Public/Admin/js/bootstrap/bootstrap.min.js"></script>
<script src="/hospital/Public/Admin/js/jquery-ui-1.9.2/ui/minified/jquery-ui.min.js"></script>
<script src="/hospital/Public/Admin/js/common.js"></script>
<!-- Load modernizr first -->
<script type="text/javascript" src="/hospital/Public/Admin/js/libs/modernizr.js"></script>

<!-- <script type="text/javascript" src="/hospital/Public/Admin/js/bootstrap/bootstrap.js"></script> -->
<script type="text/javascript" src="/hospital/Public/Admin/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="/hospital/Public/Admin/js/libs/jRespond.min.js"></script>

<!-- Charts plugins -->
<script type="text/javascript" src="/hospital/Public/Admin/plugins/charts/sparkline/jquery.sparkline.min.js"></script><!-- Sparkline plugin -->

<!-- Misc plugins -->
<script type="text/javascript" src="/hospital/Public/Admin/plugins/misc/qtip/jquery.qtip.min.js"></script>
<!-- Custom tooltip plugin -->
<script type="text/javascript" src="/hospital/Public/Admin/plugins/misc/totop/jquery.ui.totop.min.js"></script>

<!-- Search plugin -->
<script type="text/javascript" src="/hospital/Public/Admin/plugins/misc/search/tipuesearch_set.js"></script>
<script type="text/javascript" src="/hospital/Public/Admin/plugins/misc/search/tipuesearch_data.js"></script>
<!-- JSON for searched results -->
<script type="text/javascript" src="/hospital/Public/Admin/plugins/misc/search/tipuesearch.js"></script>

<!-- Form plugins -->
<script type="text/javascript" src="/hospital/Public/Admin/plugins/forms/uniform/jquery.uniform.min.js"></script>
<script type="text/javascript" src="/hospital/Public/Admin/plugins/forms/select/select2.min.js"></script>
<script type="text/javascript" src="/hospital/Public/Admin/plugins/forms/togglebutton/jquery.toggle.buttons.js"></script>

<!-- Init plugins -->
<script type="text/javascript" src="/hospital/Public/Admin/js/main.js"></script><!-- Core js functions -->

<script>

function checkAll(obj){
    $(obj).parents('.b-group').eq(0).find("input[type='checkbox']").prop('checked', $(obj).prop('checked'));
}
</script>
    



</body>
</html>