<?php

namespace app\modules\v1\controllers;

use app\models\Articles;
use yii\rest\ActiveController;
use yii\rest\Controller;

/**
 * Default controller for the `v1` module
 */
class DefaultController extends ActiveController
{
    public $modelClass = 'app\models\Articles';

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
//        $res = Articles::findOne(1);
//        return $res;
    }
}
