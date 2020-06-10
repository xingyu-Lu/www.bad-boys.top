<?php

namespace app\modules\admin\controllers;

use app\models\BlogAdminUser;
use app\modules\admin\controllers\BaseController;
use Yii;

/**
 * 仪表盘
 */
class DashboardController extends BaseController
{
	public $layout = 'main';
	
	public function actionIndex()
	{
		return $this->render('index');
	}

	public function actionEdit()
	{
		$user_id = $this->getSession();

		$user_info = BlogAdminUser::findOne($user_id);

		if ($user_info->load(Yii::$app->request->post())) {
			$user_info->setScenario('edit');
			if (!$user_info->validate('edit')) {
				return $this->render('edit', [
					'user_info' => $user_info
				]);
			}
			$user_info->save();
			return $this->render('edit', [
				'user_info' => $user_info
			]);
		}

		return $this->render('edit', [
			'user_info' => $user_info
		]);
	}

	public function actionPwdReset()
	{
		$user_info = new BlogAdminUser();

		if ($user_info->load(Yii::$app->request->post())) {
			if (!$user_info->validate()) {
				return $this->render('pwd_reset', [
					'user_info' => $user_info
				]);
			}

			$user_info->save();

			return $this->render('pwd_reset', [
				'user_info' => $user_info
			]);
		}

		return $this->render('pwd_reset', [
			'user_info' => $user_info
		]);
	}

	public function actionLogout()
	{
		$this->removeSession();

		return $this->redirect('/admin/site/login');
	}
}