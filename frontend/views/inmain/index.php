<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use frontend\models\Products;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\InmainSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inmains';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inmain-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Inmain', ['inmain/create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'date',
            'inventory',
            'company.name',
            'bill_no',
            
           

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
