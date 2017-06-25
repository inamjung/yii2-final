<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Inmain */

$this->title = 'Update Inmain: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inmains', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inmain-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
