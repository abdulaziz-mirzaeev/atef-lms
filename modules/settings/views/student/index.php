<?php

use app\modules\settings\models\Person;
use app\modules\settings\models\Student;
use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\settings\models\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Students');
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['/settings']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>
        <?php echo Html::a(Yii::t('app', 'Create Student'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php $columns = [
        [
            'attribute' => 'id',
            'width' => '130px',
        ],
        [
            'label'     => 'Name',
            'attribute' => 'person_id',
            'value'     => function (Student $model) {
                $url = Url::to(['person/view', 'id' => $model->id]);
                return "<a href=\"{$url}\">{$model->person->firstLastName}</a>";
            },
            'format'    => 'html',
        ],
        'person.birthday:date',
        [
            'attribute' => 'person.gender',
            'value'     => 'person.genderFullText',
            'filter'    => [Person::GENDER_FEMALE => 'Female', Person::GENDER_MALE => 'Male']
        ],
        'person.email:email',
        [
            'label' => 'Grade/Group',
            'value' => 'group.fullName',
        ],
        [
            'class'      => ActionColumn::class,
            'urlCreator' => function ($action, Student $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id]);
            }
        ],
    ]; ?>

    <?php echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $columns,
        'dropdownOptions' => [
            'label' => 'Export All',
            'class' => 'btn btn-outline-secondary btn-default'
        ],
        'filename' => 'students-' . date('Y-m-d'),
    ]); ?>

    <hr>

    <?php
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
    ]); ?>


</div>
