<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\settings\models\Person */

$this->title = Yii::t('app', 'Create new Person');
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['/settings']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'People'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-create">

    <h2><?php echo Html::encode($this->title) ?></h2>

    <?php $form = ActiveForm::begin(); ?>
    <?php echo $this->render('_form', [
        'form' => $form,
        'model' => $model,
    ]) ?>

    <?php ActiveForm::end(); ?>

</div>
