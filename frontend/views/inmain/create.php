<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Inmain */

$this->title = 'Create Inmain';
$this->params['breadcrumbs'][] = ['label' => 'Inmains', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inmain-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
