<?php

namespace app\modules\settings\models;

use app\helpers\DateSetup;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "person".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $birthday
 * @property int $gender
 * @property string|null $email
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property array $genders
 *
 * @property string $fullName
 * @property string $firstLastName
 * @property string $genderFullText
 */
class Person extends ActiveRecord
{
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'created_at',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
                ],
                'value'      => function () {
                    return date('Y-m-d H:i:s');
                },
            ],
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->birthday = DateSetup::convert($this->birthday);
            return true;
        }

        return false;
    }

    const GENDER_FEMALE = 0;
    const GENDER_MALE = 1;

    public static array $genders = [
        self::GENDER_FEMALE => 'Female',
        self::GENDER_MALE => 'Male',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'birthday', 'gender'], 'required'],
            [['created_at', 'updated_at'], 'datetime'],
            [['gender'], 'integer'],
//            [['birthday'], 'date'],
            [['first_name', 'last_name', 'middle_name', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'middle_name' => Yii::t('app', 'Middle Name'),
            'birthday' => Yii::t('app', 'Birthday'),
            'gender' => Yii::t('app', 'Gender'),
            'email' => Yii::t('app', 'Email'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }


    public function getFullName()
    {
        return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
    }

    public function getFirstLastName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getGenderFullText()
    {
        return $this->genders[$this->gender];
    }
}
