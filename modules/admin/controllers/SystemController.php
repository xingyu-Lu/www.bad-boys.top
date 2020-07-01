<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\BlogAccess;
use app\models\BlogAdminUser;
use app\models\BlogRole;
use app\models\BlogRoleAccess;
use app\modules\admin\controllers\BaseController;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class SystemController extends BaseController
{
	public $layout = 'main';

    public function actionIndex()
    {
    	$query = BlogAdminUser::find();

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

    public function actionCreateAdminUser()
    {
    	$model = new BlogAdminUser();

        $role_list = BlogRole::find()
            ->select('id, name')
            ->where(['status' => BlogRole::NORMAL_STATUS])
            ->asArray()
            ->all();

        $role_list = ArrayHelper::map($role_list, 'id', 'name');

    	if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
    		$model->setScenario('create_admin_user');
    		if (!$model->validate()) {
                return $this->render('create_admin_user', [
                    'model' => $model,
                    'role_list' => $role_list,
                ]);
            }
            $model->password = md5($model->password);
            $model->create_time = time();
            $model->update_time = time();
            $model->save();
            return $this->redirect('/admin/system/index');
        }

    	return $this->render('create_admin_user', [
    		'model' => $model,
            'role_list' => $role_list,
    	]);
    }

    public function actionView($id)
    {
    	$model = BlogAdminUser::findOne($id);

        return $this->render('view', [
            'model' => $model
        ]);
    }

    public function actionUpdate($id)
    {
    	$model = BlogAdminUser::findOne($id);

        $role_list = BlogRole::find()
            ->select('id, name')
            ->where(['status' => BlogRole::NORMAL_STATUS])
            ->asArray()
            ->all();

        $role_list = ArrayHelper::map($role_list, 'id', 'name');

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
        	$model->setScenario('create_admin_user');
    		if (!$model->validate()) {
                return $this->render('create_admin_user', [
                    'model' => $model,
                    'role_list' => $role_list,
                ]);
            }
            $model->password = md5($model->password);
            $model->update_time = time();
            $model->save();
            return $this->redirect('/admin/system/index');
        }

        return $this->render('update', [
            'model' => $model,
            'role_list' => $role_list,
        ]);
    }

    public function actionRole()
    {
        $query = BlogRole::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('role', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreateRole()
    {
        $model = new BlogRole();

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->create_time = time();
            $model->update_time = time();
            $model->save();

            $access_ids = implode(',', Yii::$app->request->post('access', []));

            $role_access_model = new BlogRoleAccess();
            $role_access_model->role_id = $model->id;
            $role_access_model->access_ids = $access_ids;
            $role_access_model->create_time = time();
            $role_access_model->update_time = time();
            $role_access_model->save();
            return $this->redirect('/admin/system/role');
        }

        $access_menu = BlogAccess::find()
            ->select('id, title')
            ->where(['status' => BlogAccess::NORMAL_STATUS])
            ->andWhere(['parents_id' => 0])
            ->asArray()
            ->all();

        $access_list = BlogAccess::find()
            ->select('id, title, parents_id, type')
            ->where(['status' => BlogAccess::NORMAL_STATUS])
            ->andWhere(['!=', 'parents_id', 0])
            ->asArray()
            ->all();

/*            $access_list = [
                ['id' => 5, 'title' => 'ds', 'parents_id' => 3, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 3, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 3, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 3, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 3, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 3, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 3, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 3, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 3, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 3, 'type' => 1],

                ['id' => 5, 'title' => 'ds', 'parents_id' => 3, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 3, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 3, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 3, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 3, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 3, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 3, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 3, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 3, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 3, 'type' => 1],

                ['id' => 5, 'title' => 'ds', 'parents_id' => 1, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 1, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 1, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 1, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 1, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 1, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 1, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 1, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 1, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 1, 'type' => 1],

                ['id' => 5, 'title' => 'ds', 'parents_id' => 1, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 1, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 1, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 1, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 1, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 1, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 1, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 1, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 1, 'type' => 1],
                ['id' => 5, 'title' => 'ds', 'parents_id' => 1, 'type' => 1],
            ];*/

        $access_list = array_chunk($access_list, 10);

        return $this->render('create_role', [
            'model' => $model,
            'access_menu' => $access_menu,
            'access_list' => $access_list,
            'role_access_list' => []
        ]);
    }

    public function actionUpdateRole($id)
    {
        $model = BlogRole::findOne($id);

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->update_time = time();
            $model->save();

            $access_ids = implode(',', Yii::$app->request->post('access'));

            $role_access_model = BlogRoleAccess::findOne(['role_id' => $id]);
            $role_access_model->access_ids = $access_ids;
            $role_access_model->update_time = time();
            $role_access_model->save();
            return $this->redirect('/admin/system/role');
        }

        $access_menu = BlogAccess::find()
            ->select('id, title')
            ->where(['status' => BlogAccess::NORMAL_STATUS])
            ->andWhere(['parents_id' => 0])
            ->asArray()
            ->all();

        $access_list = BlogAccess::find()
            ->select('id, title, parents_id, type')
            ->where(['status' => BlogAccess::NORMAL_STATUS])
            ->andWhere(['!=', 'parents_id', 0])
            ->asArray()
            ->all();

        $access_list = array_chunk($access_list, 10);

        $role_access_list = BlogRoleAccess::find()
            ->select('access_ids')
            ->where(['role_id' => $id])
            ->asArray()
            ->all();

        $role_access_list = array_column($role_access_list, 'access_ids');

        $role_access_list = explode(',', $role_access_list[0]);

        return $this->render('update_role', [
            'model' => $model,
            'access_menu' => $access_menu,
            'access_list' => $access_list,
            'role_access_list' => $role_access_list
        ]);
    }

    public function actionViewRole($id)
    {
        $model = BlogRole::findOne($id);

        return $this->render('view_role', [
            'model' => $model
        ]);
    }

    public function actionAccess()
    {
        $query = BlogAccess::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('access', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreateAccess()
    {
        $model = new BlogAccess();

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->create_time = time();
            $model->update_time = time();
            $model->save();
            return $this->redirect('/admin/system/access');
        }

        $access_list = BlogAccess::find()
            ->select('id, title')
            ->where(['status' => BlogAccess::NORMAL_STATUS])
            ->andWhere(['parents_id' => 0])
            ->asArray()
            ->all();

        $access_list = ArrayHelper::map($access_list, 'id', 'title');

        $access_list[0] = '无';

        return $this->render('create_access', [
            'model' => $model,
            'access_list' => $access_list
        ]);
    }

    public function actionUpdateAccess($id)
    {
        $model = BlogAccess::findOne($id);

        $access_list = BlogAccess::find()
            ->select('id, title')
            ->where(['status' => BlogAccess::NORMAL_STATUS])
            ->andWhere(['parents_id' => 0])
            ->asArray()
            ->all();

        $access_list = ArrayHelper::map($access_list, 'id', 'title');

        $access_list[0] = '无';

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->update_time = time();
            $model->save();
            return $this->redirect('/admin/system/access');
        }

        return $this->render('update_access', [
            'model' => $model,
            'access_list' => $access_list
        ]);
    }

    public function actionViewAccess($id)
    {
        $model = BlogAccess::findOne($id);

        return $this->render('view_access', [
            'model' => $model,
        ]);
    }
    public function actionForbidden()
    {
        return $this->render('forbidden');
    }
}
