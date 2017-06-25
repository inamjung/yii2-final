<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Indetail */

$this->title = 'Update Indetail: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Indetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="indetail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
