<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;

// เรียกใช้งานเพิ่ม
use common\models\Chw;
use common\models\Amp;
use common\models\Tmb;
use kartik\widgets\DepDrop;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Customers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-form">

    <?php $form = ActiveForm::begin([
         'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>
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
             <?=
            $form->field($model, 'a')->widget(DepDrop::className(), [
                        'data' => [$amp],
                        'options' => ['placeholder' => '<--คลิกเลือกอำเภอ-->'],
                        'type' => DepDrop::TYPE_SELECT2,
                        'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                        'pluginOptions' => [
                            'depends' => ['customers-c'],            
                            'url' => yii\helpers\Url::to(['/customers/get-amp']),
                            'loadingText' => 'Loading1...',
                        ],
                    ]);
            ?>
        </div>
          <div class="col-xs-3 col-sm-3 col-md-3">
            <?=
            $form->field($model, 't')->widget(DepDrop::className(), [
                        'data' => [$tmb],
                        'options' => ['placeholder' => '<--คลิกเลือกตำบล-->',
                            //'disabled'=>true, 
                            ],                        
                        'type' => DepDrop::TYPE_SELECT2,
                        'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                        'pluginOptions' => [
                            'depends' => ['customers-c', 'customers-a'],            
                            'url' => yii\helpers\Url::to(['/customers/get-tmb']),
                            'loadingText' => 'Loading2...',
                        ],
                    ]);
            ?>
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
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div> 
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">            
            <?= $form->field($model, 'interest')->inline()
                ->checkboxList(\frontend\models\Customers::itemAlias('interest')) ?>
        </div>        
   </div>
    <hr>
   <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12  ">
                <?= $form->field($model, 'pic_img')->label('รูปภาพ')->fileInput() ?>       
      </div>    
   </div>     
          <?php if ($model->pic) { ?>
                <?= Html::img('img/' . $model->pic, ['class' => 'img-responsive img-circle', 'width' => '150px;']); ?>
          <?php } ?> 
    <br>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="glyphicon glyphicon-ok"></i> บันทึก' : '<i class="glyphicon glyphicon-ok"></i> บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
