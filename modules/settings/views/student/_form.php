<?php

use app\modules\settings\models\Grade;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use kartik\typeahead\Typeahead;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\JqueryAsset;

/* @var $this yii\web\View */
/* @var $model app\modules\settings\models\Student */
/* @var $mPerson app\modules\settings\models\Person */
/* @var $form yii\bootstrap5\ActiveForm */
?>

    <div class="student-form">

        <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-lg-6">
                <div class="btn-group my-3" role="group">
                    <input type="radio" class="btn-check" name="is-new" id="is-new1" value="false" autocomplete="off"
                           checked>
                    <label class="btn btn-outline-primary" for="is-new1">Existing</label>

                    <input type="radio" class="btn-check" name="is-new" id="is-new2" value="true" autocomplete="off">
                    <label class="btn btn-outline-primary" for="is-new2">Create new</label>
                </div>

                <?php echo Html::label('Student', null, ['class' => 'form-label d-block']) ?>

                <?php echo Typeahead::widget([
                    'name'          => 'person',
                    'options'       => ['placeholder' => 'Find person...', 'autocomplete' => 'off'],
                    'pluginOptions' => ['highlight' => true],
                    'dataset'       => [
                        [
                            'datumTokenizer' => "Bloodhound.tokenizers.obj.whitespace('full_name')",
                            'display'        => 'full_name',
                            'remote'         => [
                                'url'      => Url::to(['person/list']) . '?query=%QUERY',
                                'wildcard' => '%QUERY',
                            ],
                        ],
                    ],
                ]); ?>

                <?php echo $form->field($model, 'person_id')->hiddenInput(['id' => 'person_id'])->label(false); ?>

                <?php echo $form->field($model, 'grade_id')->widget(Select2::class, [
                    'data'          => ArrayHelper::map(Grade::find()->asArray()->all(), 'id', 'name'),
                    'options'       => ['placeholder' => 'Select a grade...', 'id' => 'grade-id'],
                    'size'          => 'md',
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]); ?>

                <?php echo $form->field($model, 'group_id')->widget(DepDrop::class, [
                    'type' => DepDrop::TYPE_SELECT2,
                    'pluginOptions' => [
                        'depends'     => ['grade-id'],
                        'placeholder' => 'Select a group',
                        'url'         => Url::to(['group/groups-by-grade']),
                    ],
                ]) ?>


                <div class="form-group">
                    <?php echo Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-body">
                    <?php echo $this->render('/person/_form', [
                        'model' => $mPerson,
                        'ajax'  => true,
                        'form'  => $form,
                    ]); ?>
                </div>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

<?php
$this->registerJsFile('@web/js/settings/student-form.js', ['depends' => JqueryAsset::class])
?>