<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mcms\cart\Cart;

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
        <div class="col-xs-4 col-sm-4 col-md-4">
            
        </div>
         <div class="col-xs-4 col-sm-4 col-md-4">
            
        </div>
         <div class="col-xs-4 col-sm-4 col-md-4">
            
        </div>
    </div>

    

    <?= $form->field($model, 'company_id')->textInput() ?>

    <?= $form->field($model, 'bill_no')->textInput() ?>

    <?= $form->field($model, 'inventory')->dropDownList([ 'i' => 'I', 'o' => 'O', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
