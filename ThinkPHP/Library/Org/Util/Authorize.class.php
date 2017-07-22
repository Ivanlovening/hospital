<?php
namespace Org\Util;

class Authorize
{
	/**
	 * string: 微信公众号的唯一标识。
	 */
	public $appId;

	/**
	 * bool: 微信公众号“网页授权回调页面域名”是否为https方式。
	 */
	public $callbackDomainUseHttps = false;

	/**
	 * string: 用于标识来自微信服务器的请求的get参数名。
	 */
	public $fromWeixinGetParamName = '__lion_from_weixin';

	/**
	 * string: 用于标识来自微信服务器的请求的get参数值。
	 */
	public $fromWeixinGetParamValue = 'yes';

	/**
	 * @param $appId: 参见$this->appId。
	 */
	public function __construct($appId)
	{
		$this->appId = $appId;
	}

	/**
	 * 从微信公众号接口“网页授权获取用户信息”中获取get参数code后，再将其通过get方式跳转传递给任何域名下的url。
	 *
	 * @param array $redirectUrl: 跳转url的配置，是一维数组，元素的键作为$redirectUrlGetParamName参数对应的get参数的值，
	 * 	元素的值即为具体的跳转url，get参数code将附加到该url中进行跳转。具体跳转到哪一个url由其对应的键决定，而该键将从get参数中获取。
	 * 	可以设置一个或多个元素；
	 * @param string $redirectUrlGetParamName: 获取$redirectUrl数组中的跳转url时使用的get参数名；
	 * @param bool $overrideParam: url中的get参数是否覆盖$redirectUrl数组中的跳转url的get参数。无论如何这三个get参数code、scope和state总是强制覆盖；
	 */
	public function getCodeToUrl($redirectUrl = array(), $redirectUrlGetParamName = 'rk', $overrideParam = false)
	{
		$finalRedirectUrl = '';
		if (!empty($_GET[$this->fromWeixinGetParamName]) && $_GET[$this->fromWeixinGetParamName] == $this->fromWeixinGetParamValue) {
			//dump($_GET);exit;
			if (empty($_GET[$redirectUrlGetParamName])) {
				
				$redirectUrlKey = $redirectUrlGetParamName;
				
				if ($redirectUrl[$redirectUrlKey]) {
					
					$finalRedirectUrl = $redirectUrl[$redirectUrlKey];
					//$filterParamName = [$redirectUrlGetParamName, $this->fromWeixinGetParamName];
					$filterParamName = array(
						$redirectUrlGetParamName,
						$this->fromWeixinGetParamName
						);
					//$forceParamName = ['code', 'scope', 'state'];
					$forceParamName = array(
						'0'=>'code',
						 '1'=>'scope',
						 '2'=>'state'
						);
					//$newGetParam = [];
					$newGetParam = array();

					foreach ($_GET as $k => $v) {
						if (
							!in_array($k, $filterParamName)
							&& ($overrideParam || (!$overrideParam && (in_array($k, $forceParamName) || !preg_match("/[\?|\&]{$k}\=/", $finalRedirectUrl))))
						) {
							$newGetParam[$k] = $v;
						}
					}
					if ($newGetParam) {
						$finalRedirectUrl .= (strpos($finalRedirectUrl, '?') === false ? '?' : '&') . http_build_query($newGetParam);
					}
					//dump($finalRedirectUrl);exit;
				}
			}
		} else {
			
			$_GET[$this->fromWeixinGetParamName] = $this->fromWeixinGetParamValue;
			$_GET[$this->fromWeixinGetParamName] = $this->fromWeixinGetParamValue;
			$apiParamState = empty($_GET['state']) ? 'STATE' : $_GET['state'];
			unset($_GET['state']);
			$apiParamRedirectUrl = explode('?', $_SERVER['REQUEST_URI']);
			$apiParamRedirectUrl = 'http' . ($this->callbackDomainUseHttps ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] . $apiParamRedirectUrl[0];
			$apiParamRedirectUrl .= '?' . urldecode(http_build_query($_GET));
			$apiParam['appid'] = $this->appId;
			$apiParam['redirect_uri'] = urlencode($apiParamRedirectUrl);
			$apiParam['response_type'] = 'code';
			$arr = array(
				"0" => 'snsapi_base', 
				"1" => 'snsapi_userinfo'
				);
			$apiParam['scope'] = !empty($_GET['scope']) && in_array($_GET['scope'], $arr) ? $_GET['scope'] : 'snsapi_base';
			$apiParam['state'] = "{$apiParamState}#wechat_redirect";
			$finalRedirectUrl = 'https://open.weixin.qq.com/connect/oauth2/authorize?' . urldecode(http_build_query($apiParam));
		}
		if ($finalRedirectUrl) {

			header("Location: $finalRedirectUrl");
		}
		//echo 2;exit;
	}
}
