<?php
namespace Vendor\Wxpay;


use Exception;

class  SDKRuntimeException extends Exception {
	public function errorMessage()
	{
		return $this->getMessage();
	}

}

?>