<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\modules\settings\models\Person;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\settings\models\PersonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'People');
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['/settings']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-index">

    <h2><?php echo Html::encode($this->title) ?></h2>

    <p>
        <?php echo Html::a(Yii::t('app', 'Create Person'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'first_name',
            'last_name',
            'middle_name',
            'birthday:date',
            [
                'attribute' => 'gender',
                'format' => function ($value) {
                    return Person::$genders[$value];
                },
            ],
            'email:email',
            'created_at:datetime',
            'updated_at:datetime',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Person $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
