<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DepartmentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มข้อมูล', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'striped'=>false,
        'hover'=>true,
        // ส่งออกข้อมูลของ kartik gridview
        'panel' => [
        'type' => GridView::TYPE_SUCCESS,
        'heading' => ''
    ],
    'toolbar' => [       
        '{export}',
        '{toggleData}'       
    ],
    'exportConfig' => [
        GridView::EXCEL => [],
        GridView::PDF => []
    ],
        // จบส่งออกข้อมูลของ kartik gridview
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
