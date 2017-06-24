<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Customers */

$this->title = 'Create Customers';
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customers-create">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->

   <div class="panel panel-primary">
       <div class="panel-heading"><h3><i class="glyphicon glyphicon-pencil"></i> เพิ่มข้อมูลพนักงาน</h3></div> 
        <div class="panel-body">
            <?=
            $this->render('_form', [
                'model' => $model,
                
                // ส่งตัวแปรว่างไปให้ฟอร์ม
                'amp'=>[],
                'tmb'=>[]
            ])
            ?>
        </div>
    </div>  

</div>
