<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\web\View;

$this->title = '更新系统角色';
$current_action = $this->context->action->id;

?>

<?php echo Yii::$app->view->renderFile("@app/modules/admin/views/common/tab_system.php",[ 'current' => $current_action ]);?>

<h2><?= Html::encode($this->title) ?></h2>

<?=
$this->render('_role_form', [
    'model' => $model,
    'access_menu' => $access_menu,
    'access_list' => $access_list,
    'role_access_list' => $role_access_list,
])
?>
