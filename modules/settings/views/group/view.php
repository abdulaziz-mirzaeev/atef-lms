<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\settings\models\Group */

$this->title = $model->grade->name . '/' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['/settings']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="group-view">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>
        <?php echo Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="col-lg-6">
        <?php echo DetailView::widget([
            'model'      => $model,
            'attributes' => [
                'id',
                'number',
                'grade_id',
                [
                    'attribute' => 'grade.name',
                    'label' => 'Grade Name'
                ],
            ],
        ]) ?></div>


</div>
