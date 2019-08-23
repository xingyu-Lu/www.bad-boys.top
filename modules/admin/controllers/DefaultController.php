<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    public $layout = 'main';
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        if (!empty(Yii::$app->user->identity)) {
            return $this->render('index');
        }
        return $this->redirect('/site/index');
    }
}
