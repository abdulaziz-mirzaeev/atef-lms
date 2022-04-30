<?php

use app\modules\settings\models\Person;
use kartik\date\DatePicker;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\settings\models\Person */
/* @var $form yii\widgets\ActiveForm */
/* @var $ajax bool */
?>

<div class="person-form">

    <div class="row">
        <div class="col-md-6">
            <?php echo $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <?php echo $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>
    <div class="row">
        <div class="col-md-6">
            <?php echo $form->field($model, 'gender')->inline()->radioList(Person::$genders) ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->field($model, 'birthday')->widget(DatePicker::class, [
                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                'removeButton' => false,
                'pluginOptions' => [
                    'autoclose' => true,
                ]
            ]) ?>
        </div>
    </div>

    <?php echo $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php if (!$ajax): ?>
        <div class="form-group">
            <?php echo Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
    <?php endif; ?>


</div>
