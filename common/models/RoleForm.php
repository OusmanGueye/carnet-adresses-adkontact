<?php

namespace common\models;
use Yii;

class RoleForm extends \yii\base\Model
{
    public $name;
    public $description;
    public $is_deleted;

    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['name'], 'string', 'max' => 64],
            [['description'], 'string', 'max' => 255],
            [['name'], 'validateRoleName'],
            [['is_deleted'], 'default', 'value' => false],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Nom du Rôle',
            'description' => 'Description',
            'is_deleted' => 'Supprimé',
        ];
    }


    public function validateRoleName($attribute, $params)
    {
        $auth = Yii::$app->authManager;
        if ($auth->getRole($this->name)) {
            $this->addError($attribute, 'Le nom de rôle a déjà été pris.');
        }
    }

}