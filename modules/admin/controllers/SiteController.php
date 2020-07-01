<?php

namespace app\modules\admin\controllers;

use Yii;
use app\common\components\WebBaseController;
use app\models\BlogAdminUser;

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

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
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

            $this->setLoginStatus($user_info->id, $user_info->role_id, $user_info->is_admin);
        }

        // $user_id = $this->getSession();

        // if ($user_id) {
        //     return $this->redirect('/admin/dashboard/index');
        // }

        $session = $this->checkLoginStatus();

        if ($session) {
            return $this->redirect('/admin/dashboard/index');
        }

        return $this->render('login', [
            'model' => $model
        ]);
    }
}
