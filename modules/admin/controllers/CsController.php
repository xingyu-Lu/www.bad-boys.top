<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\controllers\BaseController;

class CsController extends BaseController
{
    public $layout = 'cs_main';

    public function actionIndex()
    {
    	$user_id = $this->getSession('user_id');

        return $this->render('index', [
        	'user_id' => $user_id,
        ]);
    }

}
