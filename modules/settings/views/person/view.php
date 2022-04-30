<?php

use app\modules\settings\models\Person;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\settings\models\Person */

$this->title = $model->id . ' - ' . $model->fullName;
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['/settings']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'People'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="person-view">

    <h2 class="mb-3"><?php echo Html::encode($this->title) ?></h2>

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

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'first_name',
            'last_name',
            'middle_name',
            'birthday',
            [
                'attribute' => 'gender',
                'value' => function ($model) {
                    return Person::$genders[$model->gender];
                }
            ],
            'email:email',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
