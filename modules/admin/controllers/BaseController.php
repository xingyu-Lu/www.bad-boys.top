<?php

namespace app\modules\admin\controllers;

use app\common\components\WebBaseController;
use app\models\BlogAccess;
use app\models\BlogAdminUser;
use app\models\BlogRoleAccess;


/**
 * base控制器
 */
class BaseController extends WebBaseController
{	
	public $ignore_url = [
		'admin/system/forbidden',
		'admin/site/login',
		'admin/site/captcha',
	];

	public function beforeAction($action)
	{
		$res = $this->checkLoginStatus();

		if (in_array($action->getUniqueId(), $this->ignore_url)) {
			return true;
		}

		if (empty($res)) {
			return $this->redirect('/admin/site/login');
		}

		$res = $this->checkRoleAccess($action->getUniqueId());

		if (empty($res)) {
			return $this->redirect('/admin/system/forbidden');
		}

		parent::beforeAction($action);

		return true;
	}

	public function checkRoleAccess($url)
	{
		$is_admin = $this->getSession('is_admin');

		$role_id = $this->getSession('role_id');

		if ($is_admin == BlogAdminUser::ADMIN_STATUS) {
			return true;
		}

		$access_id = BlogAccess::find()
			->select('id')
			->where(['urls' => $url])
			->asArray()
			->one();

		$role_access_list = BlogRoleAccess::find()
			->select('access_ids')
			->where(['role_id' => $role_id])
			->asArray()
			->one();

		$role_access_ids = explode(',', $role_access_list['access_ids']);
		// var_dump($url, $access_id, $role_access_ids);exit;

		if (in_array($access_id['id'], $role_access_ids)) {
			return true;
		} else {
			return false;
		}
	}

	public function checkLoginStatus()
	{
		$user_id = $this->getSession('user_id');

		if ($user_id) {
			return $user_id;
		}

		return false;
	}

	public function setLoginStatus($user_id, $role_id, $is_admin)
	{
		$this->setSession('user_id', $user_id);

		$this->setSession('role_id', $role_id);

		$this->setSession('is_admin', $is_admin);

		return true;
	}

	public function Logout()
	{
		$this->removeSession('user_id');

		$this->removeSession('role_id');

		$this->removeSession('is_admin');

		return true;
	}
}