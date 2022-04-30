<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\settings\models\Person */

$this->title = Yii::t('app', 'Update Person: {name}', [
    'name' => $model->fullName,
]);
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['/settings']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'People'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="person-update">

    <h2><?php echo Html::encode($this->title) ?></h2>

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $this->render('_form', [
        'form' => $form,
        'model' => $model,
    ]) ?>

    <?php ActiveForm::end(); ?>

</div>
