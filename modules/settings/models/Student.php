<?php

namespace app\modules\settings\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property int $person_id
 * @property int|null $grade_id
 * @property int|null $group_id
 */
class Student extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['grade_id', 'group_id'], 'required'],
            [['person_id', 'grade_id', 'group_id'], 'integer'],
            [['person_id'], 'unique'],
            [['person_id'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'person_id' => Yii::t('app', 'Person ID'),
            'grade_id' => Yii::t('app', 'Grade ID'),
            'group_id' => Yii::t('app', 'Group ID'),
        ];
    }

    public function getPerson()
    {
        return $this->hasOne(Person::class, ['id' => 'person_id']);
    }
}
