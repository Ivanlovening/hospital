<?php
	include "TopSdk.php";
	date_default_timezone_set('Asia/Shanghai'); 

	$c = new TopClient;

	$c->appkey = "23540374";
	$c->secretKey = "61aeb95180ad194a67c1a7e8955a62ea";
	$req = new AlibabaAliqinFcSmsNumSendRequest;
	$req->setExtend("123456");
	$req->setSmsType("normal");
	$req->setSmsFreeSignName("小聪科技");
	$req->setSmsParam("{\"nember\":\"00001\"}");
	$req->setRecNum("13662508566");
	$req->setSmsTemplateCode("SMS_27575173");
	$resp = $c->execute($req);
	var_dump( json_decode( json_encode($resp),true ) );
