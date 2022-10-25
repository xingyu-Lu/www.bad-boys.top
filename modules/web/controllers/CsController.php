<?php

namespace app\modules\web\controllers;

use app\modules\web\controllers\BaseController;

/**
 * Default controller for the `web` module
 */
class CsController extends BaseController
{
	public $layout = 'cs_main';

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
