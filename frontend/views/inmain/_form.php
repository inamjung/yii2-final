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
        'action'=>'index.php?r=inmain/add'
    ]); ?>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?= $form->field($model, 'product_id')->widget(Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\frontend\models\Products::find()->all(), 'id', 'name'),                
                'language' => 'th',
                'options' => ['placeholder' => 'เลือกรายการ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);?>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2">
            <?= $form->field($model, 'qty')->label('จำนวนรับ')->textInput(array('equired""')) ?>
        </div>
         <div class="col-xs-2 col-sm-2 col-md-2">
            <?= $form->field($model, 'price')->label('ราคา')->textInput(array('equired""')) ?>
        </div>
         <div class="col-xs-2 col-sm-2 col-md-2">
             <?=
                $form->field($model, 'exp')->label('วันหมดอายุ')->widget(DatePicker::className(), ['clientOptions' => [
                        'changeMonth' => true,
                        'changeYear' => true,],
                    'dateFormat' => 'yyyy-MM-dd',
                    'options' => [//'style' => 'width:250px;',
                        'class' => 'form-control',
                                'required' => ''
                        
                        ]]);
                ?>
        </div>
         <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    </div>

   

    <?php ActiveForm::end(); ?>

    
    <hr>
     <?php $form = ActiveForm::begin(['id' => 'cart-form', 'options' => ['class' => 'form-horizontal'],]) ?>
    
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
            <div style="float: left;">
                <?php
                if ($cart->contents() != '') {
                    echo Html::a('<i class="fa fa-refresh fa-spin"></i> ประมาณผล', ['inmain/in',], ['class' => 'btn btn-warning']);
                }
                ?>


            </div>

        </div>
    </div>
</div>
<?php ActiveForm::end() ?>
