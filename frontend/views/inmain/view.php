<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Inmain */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inmains', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inmain-view">

    <h1><?= Html::encode($this->title) ?></h1>
    
    

<!--    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>-->
    
    <?= Html::a('พิมพื', ['report', 'id' => $model->id], ['class' => 'btn btn-info','target'=>'_blank']) ?>
<?php 
    $dataProvider = new yii\data\ActiveDataProvider([
        'query'=> frontend\models\Indetail::find()->
            where(['inventory_id'=>$model->id])->
            orderBy('id DESC'),
            'pagination'=>[
                'pageSize'=>20
            ]
    ]);

?>
     <?= GridView::widget([
        'dataProvider' => $dataProvider,
       
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'product_id',
                
            ],
            [
                'attribute'=>'qty',
                
            ],
            [
                'attribute'=>'price',
                
            ],
            [
                'attribute'=>'exp',
                
            ],
            
        ],
    ]); ?>
   

</div>
