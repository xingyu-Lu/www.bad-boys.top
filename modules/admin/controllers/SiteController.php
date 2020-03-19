<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\BlogAdminUser;
use app\modules\admin\controllers\BaseController;

/**
 * Default controller for the `admin` module
 */
class SiteController extends BaseController
{
    public $layout = false;

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'width'           => 85,
                'height'          => 40,
                'padding'         => 0,
                'minLength'       => 4,
                'maxLength'       => 4,
                'padding' => 1,
                'offset' => 1,
            ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionLogin()
    {
        $model = new BlogAdminUser();

        if ($model->load(Yii::$app->request->post())) {
            $model->setScenario('login');
            if (!$model->validate()) {
                return $this->render('login', [
                    'model' => $model
                ]);
            }

            $user_info = $model->findOne(['email' => $model->email]);

            if (empty($user_info)) {
                $model->addError('email', '邮箱错误');
                return $this->render('login', [
                    'model' => $model
                ]);
            }

            if (md5($model->password) != $user_info->password) {
                $model->addError('password', '密码错误');
                return $this->render('login', [
                    'model' => $model
                ]);
            }

            $this->setLoginStatus($user_info->id);

            return $this->redirect('/admin/dashbord/index');
        }

        $session = $this->checkLoginStatus();

        if ($session) {
            $this->redirect('/admin/dashbord/index');
        }

        return $this->render('login', [
            'model' => $model
        ]);
    }
}
