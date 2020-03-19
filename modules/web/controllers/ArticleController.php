<?php

namespace app\modules\web\controllers;

use app\models\BlogArticles;
use app\modules\web\controllers\BaseController;
use yii\data\Pagination;

/**
 * Default controller for the `web` module
 */
class ArticleController extends BaseController
{
	public $layout = 'main';

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $query = BlogArticles::find()->where(['status' => 0]);

        $count = $query->count();

        $pagination = new Pagination(['totalCount' => $count, 'defaultPageSize' => 10]);

        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'pagination' => $pagination,
            'articles' => $articles,
        ]);
    }

    public function actionPhp()
    {
        $query = BlogArticles::find()->where(['status' => 0, 'category' => BlogArticles::CATEGORY_0]);

        $count = $query->count();

        $pagination = new Pagination(['totalCount' => $count, 'defaultPageSize' => 10]);

        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'pagination' => $pagination,
            'articles' => $articles,
        ]);
    }

    public function actionLinux()
    {
        $query = BlogArticles::find()->where(['status' => 0, 'category' => BlogArticles::CATEGORY_1]);

        $count = $query->count();

        $pagination = new Pagination(['totalCount' => $count, 'defaultPageSize' => 10]);

        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'pagination' => $pagination,
            'articles' => $articles,
        ]);
    }

    public function actionArithmetic()
    {
        $query = BlogArticles::find()->where(['status' => 0, 'category' => BlogArticles::CATEGORY_2]);

        $count = $query->count();

        $pagination = new Pagination(['totalCount' => $count, 'defaultPageSize' => 10]);

        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'pagination' => $pagination,
            'articles' => $articles,
        ]);
    }

    public function actionOthers()
    {
        $query = BlogArticles::find()->where(['status' => 0, 'category' => BlogArticles::CATEGORY_3]);

        $count = $query->count();

        $pagination = new Pagination(['totalCount' => $count, 'defaultPageSize' => 10]);

        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'pagination' => $pagination,
            'articles' => $articles,
        ]);
    }

    public function actionInfo($id)
    {
        if (empty($id)) {
            return $this->redirect('/web/article/index');
        }

        $article = BlogArticles::findOne($id);

        $article->count += 1;

        $article->save();

    	return $this->render('info', [
            'article' => $article
        ]);
    }

    public function actionSearch($keywords)
    {
        $articles_query = BlogArticles::find()
            ->where(['like', 'title', $keywords]);
        
        $count = $articles_query->count();

        $pagination = new Pagination(['totalCount' => $count, 'defaultPageSize' => 10]);

        $articles = $articles_query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'pagination' => $pagination,
            'articles' => $articles,
        ]);
    }

    public function actionTag($tag)
    {
        $articles_query = BlogArticles::find()
            ->where(['tag' => $tag]);
        
        $count = $articles_query->count();

        $pagination = new Pagination(['totalCount' => $count, 'defaultPageSize' => 10]);

        $articles = $articles_query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'pagination' => $pagination,
            'articles' => $articles,
            'tag' => $tag
        ]);
    }
}
