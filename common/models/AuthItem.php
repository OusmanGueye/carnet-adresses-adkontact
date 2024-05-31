<?php

namespace common\models;

use yii\db\ActiveRecord;

class AuthItem extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%auth_item}}';
    }

    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['name'], 'string', 'max' => 64],
            [['is_deleted'], 'boolean'],
            [['is_deleted'], 'default', 'value' => false],
        ];
    }
}