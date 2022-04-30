<?php

namespace app\modules\settings\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property int $id
 * @property int $grade_id
 * @property int $number
 */
class Group extends \yii\db\ActiveRecord
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
}
