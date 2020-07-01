<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\web\View;

$this->title = '更新文章';

?>

<?php echo Yii::$app->view->renderFile("@app/modules/admin/views/common/tab_article.php",[ 'current' => '' ]);?>

<h2><?= Html::encode($this->title) ?></h2>

<?=
$this->render('_form', [
    'model' => $model,
])
?>
