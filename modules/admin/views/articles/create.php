<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\web\View;

$this->title = '添加文章';

?>

<h2><?= Html::encode($this->title) ?></h2>

<?=
$this->render('_form', [
    'model' => $model,
])
?>
