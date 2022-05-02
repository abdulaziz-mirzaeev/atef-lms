<?php

namespace app\modules\settings\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "group".
 *
 * @property int $id
 * @property int $grade_id
 * @property int $number
 *
 * @property Grade $grade
 * @property string $fullName
 */
class Group extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['grade_id', 'number'], 'required'],
            [['grade_id', 'number'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'grade_id' => Yii::t('app', 'Grade ID'),
            'number' => Yii::t('app', 'Number'),
        ];
    }

    public function getGrade()
    {
        return $this->hasOne(Grade::class, ['id' => 'grade_id']);
    }


    public function getFullName()
    {
        return $this->grade->name . '/' . $this->number;
    }
}
