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
<link rel="stylesheet" href="/Public/Admin/js/jquery-ui-1.9.2/themes/base/jquery-ui.css" />

	
<!-- Core stylesheets do not remove -->
<link id="bootstrap" href="/Public/Admin/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/bootstrap/bootstrap-theme.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/supr-theme/jquery.ui.supr.css" rel="stylesheet" type="text/css"/>
<link href="/Public/Admin/css/icons.css" rel="stylesheet" type="text/css" />


<link href="/Public/Admin/plugins/misc/qtip/jquery.qtip.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/plugins/forms/uniform/uniform.default.css" type="text/css" rel="stylesheet" />
<link href="/Public/Admin/plugins/forms/select/select2.css" type="text/css" rel="stylesheet" />
<link href="/Public/Admin/plugins/forms/togglebutton/toggle-buttons.css" type="text/css" rel="stylesheet" />

<!-- Main stylesheets -->
<link href="/Public/Admin/css/main.css" rel="stylesheet" type="text/css" /> 

<!-- Custom stylesheets ( Put your own changes here ) -->
<link href="/Public/Admin/css/custom.css" rel="stylesheet" type="text/css" /> 

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="/Public/Admin/images/favicon.ico" />

<!--<![endif]-->


</head>
<body>
	

	<div id="wrapper">
    

    
    <body class="loginPage">

        <div class="container">

            <div id="header">

                <div class="row">

                    <div class="navbar">
                        <div class="container">
                            <a class="navbar-brand" href="dashboard.html">禅修后台管理系统<span class="slogan"></span></a>
                        </div>
                    </div><!-- /navbar -->

                </div><!-- End .row -->

            </div><!-- End #header -->

        </div><!-- End .container -->

        <div class="container">

            <div class="loginContainer">
                <div class="form-horizontal" id="loginForm" role="form" >
                    <div class="form-group">
                        <label class="col-lg-12 control-label" for="username">账号:</label>
                        <div class="col-lg-12">
                            <input id="username" type="text" name="username" class="form-control" placeholder="admin" value="admin">
                            <span class="icon16 icomoon-icon-user right gray marginR10"></span>
                        </div>
                    </div><!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-12 control-label" for="password">密码:</label>
                        <div class="col-lg-12">
                            <input id="password" type="password" name="password" value="123456" class="form-control" placeholder="123456">
                            <span class="icon16 icomoon-icon-lock right gray marginR10"></span>
                            <span class="newuser help-block"><a href="<?php echo U('registeruser');?>">注册新账号</a></span>
                            <span class="forgot help-block"><a href="#">忘记密码?</a></span>
                        </div>
                    </div><!-- End .form-group  -->

                    <div class="form-group">
                        <label class="col-lg-12 control-label" id="labelInfo"></label>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-12 clearfix form-actions">
                            <div class="checkbox left">
                                <label><input type="checkbox" id="keepLoged" value="Value" class="styled" name="logged" />  记住密码</label>
                            </div>
                            <button class="btn btn-info right" id="loginBtn">
                                <span class="icon16 icomoon-icon-enter white"></span>
                                登录
                            </button>
                        </div>
                    </div><!-- End .form-group  -->

                </div>
            </div>

        </div><!-- End .container -->

    </body>

</div><!-- End #wrapper -->
	<script type="text/javascript" src="/Public/Admin/js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/form-master/jquery.form.js"></script>
<script type="text/javascript" src="/Public/Admin/js/bootstrap/bootstrap.min.js"></script>
<script src="/Public/Admin/js/jquery-ui-1.9.2/ui/minified/jquery-ui.min.js"></script>
<script src="/Public/Admin/js/common.js"></script>
<!-- Load modernizr first -->
<script type="text/javascript" src="/Public/Admin/js/libs/modernizr.js"></script>

<!-- <script type="text/javascript" src="/Public/Admin/js/bootstrap/bootstrap.js"></script> -->
<script type="text/javascript" src="/Public/Admin/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="/Public/Admin/js/libs/jRespond.min.js"></script>

<!-- Charts plugins -->
<script type="text/javascript" src="/Public/Admin/plugins/charts/sparkline/jquery.sparkline.min.js"></script><!-- Sparkline plugin -->

<!-- Misc plugins -->
<script type="text/javascript" src="/Public/Admin/plugins/misc/qtip/jquery.qtip.min.js"></script>
<!-- Custom tooltip plugin -->
<script type="text/javascript" src="/Public/Admin/plugins/misc/totop/jquery.ui.totop.min.js"></script>

<!-- Search plugin -->
<script type="text/javascript" src="/Public/Admin/plugins/misc/search/tipuesearch_set.js"></script>
<script type="text/javascript" src="/Public/Admin/plugins/misc/search/tipuesearch_data.js"></script>
<!-- JSON for searched results -->
<script type="text/javascript" src="/Public/Admin/plugins/misc/search/tipuesearch.js"></script>

<!-- Form plugins -->
<script type="text/javascript" src="/Public/Admin/plugins/forms/uniform/jquery.uniform.min.js"></script>
<script type="text/javascript" src="/Public/Admin/plugins/forms/select/select2.min.js"></script>
<script type="text/javascript" src="/Public/Admin/plugins/forms/togglebutton/jquery.toggle.buttons.js"></script>

<!-- Init plugins -->
<script type="text/javascript" src="/Public/Admin/js/main.js"></script><!-- Core js functions -->

    <script type="text/javascript">
        $(document).ready(function(){
            $("#loginBtn").click(
                function(){
                    $.ajax({
                        url: "<?php echo U('trylogin');?>",
                        datatype: "json",
                        type: 'post',
                        data : { name : document.getElementById("username").value , password : $("#password")[0].value },
                        success: function (e) {   //成功后回调
                            $("#labelInfo")[0].innerText = e;
                            if(e == "验证成功！")
                            {
                                self.location = "<?php echo U('Admin/Index/index');?>";
                            }
                        },
                        error: function(e){    //失败后回调
                            $("#labelInfo")[0].innerText = e;
                        },
                    });
                }
            );
        });
    </script>




</body>
</html>