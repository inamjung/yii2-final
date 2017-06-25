<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mcms\cart\Cart;
use frontend\models\Products;
use kartik\widgets\Select2;
use yii\jui\DatePicker;

$cart = new Cart();
if($_POST)
{
	$cart->update($_POST);
	Yii::$app->controller->refresh();
}
?>

<div class="inmain-form">

    <?php $form = ActiveForm::begin([
        'action'=>'index.php?r=inmain/intotal'
    ]); ?>
    <div class="row">
        <div class="col-xs-2 col-sm-2 col-md-2">
            <?php $count = frontend\models\Inmain::find()->where(['inventory'=>'i'])->count()+1 ;?>
            <?= $form->field($model, 'id')->textInput(['readonly'=>true, 'value'=>date('Ymd-').$count]) ?>
        
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <?=
                $form->field($model, 'date')->label('วันที่รับ')->widget(DatePicker::className(), ['clientOptions' => [
                        'changeMonth' => true,
                        'changeYear' => true,],
                    'dateFormat' => 'yyyy-MM-dd',
                    'options' => [//'style' => 'width:250px;',
                        'class' => 'form-control',
                                'required' => ''
                        
                        ]]);
                ?>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2">
            <?= $form->field($model, 'bill_no')->label('เลขที่ใบส่งของ')->textInput(array('equired""')) ?>
        </div>
         <div class="col-xs-3 col-sm-3 col-md-3">
             <?= $form->field($model, 'company_id')->widget(Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(frontend\models\Companys::find()->all(), 'id', 'name'),                
                'language' => 'th',
                'options' => ['placeholder' => 'เลือกบริษัท...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);?>
        </div>
         
    </div>
    
    <hr>
     
    
    <table cellpadding="6" cellspacing="1" style="width:100%" border="0" class="table table-bordered">
        <tr>
            <th>#</th>
            <th>รายการ</th>
            <th>จำนวน</th>
            <th>ราคา</th>
            <th>EXP</th>
        </tr>
        <?php $i = 1; ?>
         <?php foreach ($cart->contents() as $items): ?>
          <?php echo Html::hiddenInput($i . '[rowid]', $items['rowid']) ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo \frontend\models\Products::find()->where(['id' => $items['name']])->one()->name; ?></td>
                       <td><?php echo $items['qty']; ?></td> 
                       <td><?php echo $items['price']; ?></td> 
                       <td><?php echo $items['exp']; ?></td>
                       <td><?= Html::a('', ['inmain/cartdelect', 'id' => $items['rowid'],], ['class' => 'btn btn-danger glyphicon glyphicon-remove']) ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
        
    </table>
</div>
<hr>

<hr>
<div style="float: left;">
<?= Html::submitButton($model->isNewRecord ? ' บันทึก' : 'intotal', ['class' => $model->isNewRecord ? 'btn btn-success glyphicon glyphicon-saved' : 'btn btn-primary fa fa-check']) ?>

</div>
    </div>
</div>
<?php ActiveForm::end(); ?>