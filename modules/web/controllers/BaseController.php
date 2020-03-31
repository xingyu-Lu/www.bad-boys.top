<?php

namespace app\modules\web\controllers;

use app\common\components\WebBaseController;
use app\common\services\UtilService;
use app\models\BlogPvUv;
use app\models\BlogVisitor;
use Yii;

/**
 * web base 控制器
 */
class BaseController extends WebBaseController
{
	
	public function beforeAction($action)
	{
		$ua_cookie = $this->getCookie(md5('ua'));

		if (empty($ua_cookie)) {
			$ip = UtilService::getIp();

			$ip = UtilService::ipToInt($ip);

			$ua = UtilService::getUa();

			$visitor = new BlogVisitor();

			$visitor->ip = $ip;

			$visitor->ua = $ua;

			$visitor->create_time = time();

			$visitor->save();

			$expire_time = strtotime(date('Y-m-d', strtotime('+1 day')));

			$this->setCookie(md5('ua'), 'ua', $expire_time);
		}

		$pv_uv = BlogPvUv::find()->where(['day' => strtotime(date('Y-m-d'))])->one();

		if (empty($pv_uv)) {
			$pv_uv = new BlogPvUv();

			$pv_uv->day = strtotime(date('Y-m-d'));

			$pv_uv->pv += 1;

			if (empty($ua_cookie)) {
				$pv_uv->uv += 1;
			}

			$pv_uv->create_time = time();

			$pv_uv->update_time = time();
		} else {
			$pv_uv->pv += 1;

			if (empty($ua_cookie)) {
				$pv_uv->uv += 1;
			}

			$pv_uv->update_time = time();
		}

		$pv_uv->save();

		parent::beforeAction($action);

		return true;
	}
}