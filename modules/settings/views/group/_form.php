<?php

use app\modules\settings\models\Grade;
use kartik\select2\Select2;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\settings\models\Group */
/* @var $form yii\bootstrap5\ActiveForm */
?>

<div class="group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $grades = ArrayHelper::map(Grade::find()->asArray()->all(), 'id', 'name'); ?>
    <?php echo $form->field($model, 'grade_id')->widget(Select2::class, [
        'data' => $grades,
        'options' => ['placeholder' => 'Select a grade...'],
        'size' => 'md',
        'pluginOptions' => [
            'allowClear' => true,
        ]
    ]) ?>

    <?php echo $form->field($model, 'number')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
