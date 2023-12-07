<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\BlogAdminUser;
use app\models\BlogArticles;
use app\modules\admin\controllers\BaseController;
use yii\data\ActiveDataProvider;

class ArticlesController extends BaseController
{
    public $layout = 'main';

    public function actionIndex()
    {
        $title = $this->get('title');

        $query = BlogArticles::find()->orderBy('id desc');

        if (!empty($title)) {
            $query->where(['like', 'title', $title]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new BlogArticles();

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->validate()) {
            $user_info = BlogAdminUser::findOne($this->getSession('user_id'));
            $model->author = $user_info->name;
            $model->create_time = time();
            $model->update_time = time();
            $model->save();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = BlogArticles::findOne($id);

        if ($model && Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->update_time = time();
            $model->save();
        }

        return $this->render('update', [
            'model' => $model
        ]);
    }

    public function actionView($id)
    {
        $model = BlogArticles::findOne($id);

        return $this->render('view', [
            'model' => $model
        ]);
    }

    public function actionDelete($id)
    {
        BlogArticles::findOne($id)->delete();

        return $this->redirect('index');
    }

}
