<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\models\Customers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
             <?= $form->field($model, 'addr')->textarea(['row' => 3]) ?>
        </div>
       
    </div>
     <div class="row">
        
        <div class="col-xs-3 col-sm-3 col-md-3">            
             <?= $form->field($model, 'c')->widget(Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(common\models\Chw::find()->all(), 'id', 'name'),                
                'language' => 'th',
                'options' => ['placeholder' => 'เลือกจังหวัด...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);?>
        </div>
         <div class="col-xs-3 col-sm-3 col-md-3">
            <?= $form->field($model, 'a')->textInput() ?>
        </div>
          <div class="col-xs-3 col-sm-3 col-md-3">
            <?= $form->field($model, 't')->textInput() ?>
        </div>
         
        <div class="col-xs-3 col-sm-3 col-md-3">
            <?= $form->field($model, 'p')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
     <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
        </div>
<!--        <div class="col-xs-4 col-sm-4 col-md-4">
            <?= $form->field($model, 'department_id')->
            dropDownList(\yii\helpers\ArrayHelper::map(frontend\models\Departments::find()->all(), 'id', 'name'),
                    ['prompt'=>'<--เลือกแผนก-->']
                    
                    ) ?>
        </div>-->
      <div class="col-xs-4 col-sm-4 col-md-4">
            <?= $form->field($model, 'department_id')->widget(Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map(frontend\models\Departments::find()->all(), 'id', 'name'),                
    'language' => 'th',
    'options' => ['placeholder' => 'เลือกแผนก ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?= $form->field($model, 'interest')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?= $form->field($model, 'pic')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="glyphicon glyphicon-ok"></i> บันทึก' : '<i class="glyphicon glyphicon-ok"></i> บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
