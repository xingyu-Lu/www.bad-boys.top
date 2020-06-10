<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\web\View;

$this->title = '添加文章';
$current_action = $this->context->action->id;

?>

<?php echo Yii::$app->view->renderFile("@app/modules/admin/views/common/tab_article.php",[ 'current' => $current_action ]);?>

<h2><?= Html::encode($this->title) ?></h2>

<?=
$this->render('_form', [
    'model' => $model,
])
?>
