<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Companys */

$this->title = 'Create Companys';
$this->params['breadcrumbs'][] = ['label' => 'Companys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companys-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
