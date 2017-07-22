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
    

    
    <!--Body content-->
    <div id="content" class="clearfix">
        <div class="contentwrapper"><!--Content wrapper-->
            <div class="heading">
                <h3>经销商管理 > 新增经销商</h3>
            </div><!-- End .heading-->

            <!-- Build page from here: -->
            <form action="javascript:;" id="form" enctype="multipart/form-data" method="post">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-horizontal seperator" role="form" id="allControls">

                            <!-- Start .form-group  -->
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="account">姓名:</label>
                                <div class="col-lg-3">
                                    <input class="form-control" id="account" type="text" name="account" value="<?php echo ($data['account']); ?>" />
                                </div>
                            </div>
                            <!-- End .form-group  -->


                            <!-- Start .form-group  -->
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="phone">手机:</label>
                                <div class="col-lg-3">
                                    <input class="form-control " id="phone" type="text" name="phone" value="<?php echo ($data['account']); ?>" />
                                </div>
                            </div>
                            <!-- End .form-group  -->

                            <!-- Start .form-group  -->
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="idcard">身份证号码:</label>
                                <div class="col-lg-3">
                                    <input class="form-control " id="idcard" type="text" name="idcard" value="<?php echo ($data['idcard']); ?>" />
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <!-- Start .form-group  -->
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="address">地址:</label>
                                <div class="col-lg-3">
                                    <input class="form-control " id="address" type="text" name="address" value="<?php echo ($data['address']); ?>" />
                                </div>
                            </div>
                            <!-- End .form-group  -->

                            <!-- Start .form-group  -->
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="overtime">经销商有效期:</label>
                                <div class="col-lg-3">
                                    <input class="laydate-icon form-control" id="overtime" type="text" name="overtime" value="<?php echo ($data['overtime']); ?>" />
                                </div>
                            </div>
                            <!-- End .form-group  -->


                            <!-- Start .form-group  -->
                           <!-- <div class="form-group">
                                <label class="col-lg-2 control-label" for="level">等级:</label>
                                <div class="col-lg-3">
                                    <input class="form-control" id="level" type="text" name="level" value="<?php echo ($data['level']); ?>" />
                                </div>
                            </div>-->
                            <!-- End .form-group  -->

                            <!-- Start .form-group  -->
                            <!--<div class="form-group">
                                <label class="col-lg-2 control-label" for="no">经销商号:</label>
                                <div class="col-lg-3">
                                    <input class="form-control" id="no" type="text" name="no" value="<?php echo ($data['no']); ?>" />
                                </div>
                            </div>-->
                            <!-- End .form-group  -->

                            <div class="form-group" id="commitBtn">
                                <div class="col-lg-offset-2">
                                    <button id="saveBtn" type="submit" tabindex="0" class="btn btn-info marginR10 marginL10" role="button" data-toggle="popover" data-trigger="focus" title="提示信息" data-content="xxx">提交</button>
                                    <a id="backBtn" href="<?php echo U('Admin/Dealer/index');?>" class="btn btn-default marginR10 marginL10">返回</a>
                                </div>
                            </div><!-- End .form-group  -->
                        </div>
                    </div><!-- End .span12 -->

                </div><!-- End .row -->
            </form>
        </div><!-- End contentwrapper -->
    </div><!-- End #content -->
    <!--成功提示框 start modal-->
    <div class="modal fade" id="alert" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">提示窗口</h4>
                </div>
                <div class="modal-body">
                    <p id="alertText">One fine body&hellip;</p>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo U('Admin/Dealer/index');?>" type="button" class="btn btn-default" data-dismiss="modal">不再添加</a>
                    <a href="<?php echo U('Admin/Dealer/add');?>" type="button" class="btn btn-primary">继续添加</a>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!--成功提示框 End modal-->
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

    <script src="/hospital/Public/Admin/js/laydate/laydate.js"></script>
    <script src="/hospital/Public/Admin/js/validata/jquery.validate.min.js"></script>
    <script src="/hospital/Public/Admin/js/validata/localization/messages_zh.min.js"></script>
    <script>
        var putDealer = "<?php echo U('Admin/Dealer/add');?>";
        // 日历
        laydate({
            elem: '#overtime', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
            event: 'focus' //响应事件。如果没有传入event，则按照默认的click
        });

        //提示
        function layer(target, res) {
            target.attr('data-content', res);
            setTimeout(function(){
                target.popover('show');
            }, 500);
        }

        //postAjax
       function ajaxPost(url, data, callback){
            $.post(url,data, callback);
       }

       //ajax 回调函数
       function ajaxCallback(data) {
           var target = $('#saveBtn');
           if(data == 1) {
               //layer(target, '新增成功');
               $('#alertText').html('新增成功');
               $('#alert').modal('show');
           } else if(data == "") {
               layer(target, '请刷新页面,未知错误');
           }else{
               layer(target, data);
           }
       }

        //监控表单
        $.validator.setDefaults({
            submitHandler: function() {
                //alert("提交事件!");
                var formData = $('#form').serialize();
                ajaxPost(putDealer, formData, ajaxCallback)
            }
        });

        //添加自定义验证
        $.validator.addMethod("checkQQ",function(value,element,params){
            var checkQQ = /^[1-9][0-9]{4,19}$/;
            return this.optional(element)||(checkQQ.test(value));
        },"*请输入正确的QQ号码！");

        $(function(){
            //提交表单
            // 在键盘按下并释放及提交后验证提交表单
            $("#form").validate({
                rules: {
                    account: "required",
                    phone : "required",
                    idcard : "required",
                    address : "required",
                    overtime : "required"
                    /*lastname: "required",
                    username: {
                        required: true,
                        minlength: 2
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    confirm_password: {
                        required: true,
                        minlength: 5,
                        equalTo: "#password"
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    topic: {
                        required: "#newsletter:checked",
                        minlength: 2
                    },
                    agree: "required"*/
                },
                messages: {
                    account: "请输入用户名",
                    phone: "请输入手机号码",
                    idcard: "请输入身份证号码",
                    address: "请输入地址",
                    overtime: "请输入有效期"
                    /*lastname: "请输入您的姓氏",
                    username: {
                        required: "请输入用户名",
                        minlength: "用户名必需由两个字母组成"
                    },
                    password: {
                        required: "请输入密码",
                        minlength: "密码长度不能小于 5 个字母"
                    },
                    confirm_password: {
                        required: "请输入密码",
                        minlength: "密码长度不能小于 5 个字母",
                        equalTo: "两次密码输入不一致"
                    },
                    email: "请输入一个正确的邮箱",
                    agree: "请接受我们的声明",
                    topic: "请选择两个主题"*/
                }
            });

        });




    </script>




</body>
</html>