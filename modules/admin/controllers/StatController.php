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
        $start_time = $this->get('start_time', date('Y-m-d'));

        $end_time = $this->get('end_time', date('Y-m-d'));

    	$query = BlogVisitor::find()
            ->orderBy('id DESC')
            ->where(['>=', 'create_time', strtotime($start_time)])
            ->andWhere(['<=', 'create_time', strtotime($end_time) + 86400]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'start_time' => $start_time,
            'end_time' => $end_time,
        ]);
    }

    public function actionPvUv()
    {
    	$query = BlogPvUv::find()->orderBy('id DESC');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('pv_uv', [
            'dataProvider' => $dataProvider,
        ]);
    }
}