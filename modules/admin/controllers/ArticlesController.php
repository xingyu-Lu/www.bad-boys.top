<?php

namespace app\modules\admin\controllers;

use app\models\Articles;
use yii\data\ActiveDataProvider;
use Yii;

class ArticlesController extends \yii\web\Controller
{
    public $layout = 'main';

    public function actionIndex()
    {
        $query = Articles::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Articles();
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = Articles::findOne($id);

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
        }

        return $this->render('update', [
            'model' => $model
        ]);
    }

    public function actionView($id)
    {
        $model = Articles::findOne($id);

        return $this->render('view', [
            'model' => $model
        ]);
    }

}
