<?php

namespace app\modules\admin\controllers;

use app\models\BlogPvUv;
use app\models\BlogVisitor;
use app\modules\admin\controllers\BaseController;
use yii\data\ActiveDataProvider;

class StatController extends BaseController
{
	public $layout = 'main';

    public function actionIndex()
    {
    	$query = BlogVisitor::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPvUv()
    {
    	$query = BlogPvUv::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('pv_uv', [
            'dataProvider' => $dataProvider,
        ]);
    }
}