<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\IndetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Indetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indetail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Indetail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'inventory_id',
            'product_id',
            'price',
            'qty',
            // 'exp',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
