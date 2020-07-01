<?php

namespace app\common\components;

use yii\web\Controller;
use Yii;

/**
 * webbase控制器
 */
class WebBaseController extends Controller
{
	
	public $enableCsrfValidation = false;


	public function post($key, $default = "") {
		return Yii::$app->request->post($key, $default);
	}


	public function get($key, $default = "") {
		return Yii::$app->request->get($key, $default);
	}

	public function setSession($key, $value)
	{
		$session = Yii::$app->session;

		$session->set($key, $value, time()+3600*24);

		return true;
	}

	public function getSession($key)
	{
		$session = Yii::$app->session;

		$user_id = $session->get($key);

		return $user_id;
	}

	public function removeSession($key)
	{
		$session = Yii::$app->session;

		$session->remove($key);

		return true;
	}

	public function renderJson($data = [], $msg = 'success', $code = 0)
	{
		header('Content-type: application/json');

		echo json_encode([
			'code' => $code,
			'msg' => $msg,
			'data' => $data
		]);

		exit;
	}

	public function setCookie($name, $value, $time = '')
	{
		$cookies = Yii::$app->response->cookies;

		$res = $cookies->add(new \yii\web\Cookie([
		    'name' => $name,
		    'value' => $value,
		    'expire' => $time,
		]));

		return $res;
	}

	public function getCookie($name)
	{
		$cookies = Yii::$app->request->cookies;

		$value = $cookies->getValue($name, '');

		return $value;
	}

	public function removeCookie($name)
	{
		$cookies = Yii::$app->response->cookies;

		$res = $cookies->remove($name);

		return $res;
	}
}