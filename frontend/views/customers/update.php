<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Customers */

$this->title = 'Update Customers: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customers-update">

    <h1><?= Html::encode($this->title) ?></h1>

   <div class="panel panel-warning">
         <div class="panel-heading"><h3><i class="glyphicon glyphicon-pencil"></i> แก้ไขข้อมูลพนักงาน</h3></div>  
        <div class="panel-body">
            <?=
            $this->render('_form', [
                'model' => $model,
                
                // ส่งตัวแปรที่มีค่าไปให้ฟอร์ม
                'amp'=>$amp,
                'tmb'=>$tmb
            ])
            ?>
        </div>
    </div>  

</div>
