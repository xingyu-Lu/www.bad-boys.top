<?php
namespace app\modules\admin\controllers;

use app\modules\admin\controllers\BaseController;
use Yii;

/**
 * 上传类
 */
class UploadController extends BaseController
{
	
	public function actionImage()
	{
		$post = Yii::$app->request->post();
		var_dump($post);
	}
}