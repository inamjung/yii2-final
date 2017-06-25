<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Indetail */

$this->title = 'Create Indetail';
$this->params['breadcrumbs'][] = ['label' => 'Indetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indetail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
