<?php


namespace app\models;


use yii\db\ActiveRecord;

class BaseModel extends ActiveRecord
{
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord ) {
                if (property_exists($this, 'created_at')) {
                    $this->created_at = date('Y-m-d H:i:s');
                }
            } else {
                if (property_exists($this, 'updated_at')) {
                    $this->updated_at = date('Y-m-d H:i:s');
                }
            }

            return true;
        }

        return false;
    }
}