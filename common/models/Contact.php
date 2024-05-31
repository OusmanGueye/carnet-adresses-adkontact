<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%contact}}".
 *
 * @property int $id
 * @property string $nom
 * @property string $email
 * @property string $telephone
 * @property string $adresse
 * @property int $country_id
 *
 * @property Country $country
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%contact}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nom', 'email', 'telephone', 'adresse', 'country_id'], 'required'],
            [['country_id'], 'integer'],
            [['nom', 'email', 'telephone', 'adresse'], 'string', 'max' => 255],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::class, 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nom' => 'Nom',
            'email' => 'Email',
            'telephone' => 'Telephone',
            'adresse' => 'Adresse',
            'country_id' => 'Country ID',
        ];
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CountryQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::class, ['id' => 'country_id']);
    }

    /**
     * {@inheritdoc}
     * @return \yii\db\ActiveQuery the active query used by this AR class.
     */
    public static function find()
    {
       return parent::find()->where(['is_deleted' => false]);
    }

    public function softDelete()
    {
        $this->is_deleted = true;
        return $this->save(false, ['is_deleted']);
    }

    public function delete()
    {
        return $this->softDelete();
    }

    public function restore()
    {
        $this->is_deleted = false;
        return $this->save(false, ['is_deleted']);
    }
}
