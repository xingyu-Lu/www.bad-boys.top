<?php

namespace app\modules\admin\controllers;

use app\common\components\WebBaseController;


/**
 * base控制器
 */
class BaseController extends WebBaseController
{	
	public function beforeAction($action)
	{
		// $session = Yii::$app->session;

		// $session->open();

		$res = $this->checkLoginStatus();

		if (empty($res)) {
			return $this->redirect('/admin/site/login');exit;
		}

		parent::beforeAction($action);

		return true;
	}

	public function checkLoginStatus()
	{
		$user_id = $this->getSession();

		if ($user_id) {
			return $user_id;
		}

		return false;
	}

	public function setLoginStatus($user_id)
	{
		$this->setSession($user_id);

		return true;
	}


}