<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\settings\models\Student */

$this->title = $model->id . ' - ' . $model->person->firstLastName;
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['/settings']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="student-view">

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

    <div class="row">
        <div class="col-lg-6">
            <?php echo DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'person_id',
                    'person.first_name',
                    'person.last_name',
                    'person.middle_name',
                    [
                        'attribute' => 'person.gender',
                        'value' => $model->person->genderFullText,
                    ],
                    'person.birthday:date',
                    'person.email:email',
                    [
                        'label' => 'Grade/Group',
                        'value' => $model->group->fullName,
                    ],
                    'grade_id',
                    'group_id',
                ],
            ]) ?>
        </div>
    </div>

</div>
