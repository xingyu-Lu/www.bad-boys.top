<?php

namespace app\modules\v1\controllers;

use app\models\BlogAdminUser;
use yii\rest\ActiveController;
use yii\rest\Controller;
use yii\web\Response;

/**
 * Default controller for the `v1` module
 */
class DefaultController extends ActiveController
{
    public $modelClass = 'app\models\BlogAdminUser';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
    
    public function behaviors()
	{
	   $behaviors = parent::behaviors();
	   $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
	   return $behaviors;
	}

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
       // $res = BlogAdminUser::findOne(2);
       // $res = [['aa','bb']];
       // return $res;
    }
}
