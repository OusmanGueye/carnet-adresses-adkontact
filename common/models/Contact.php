<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%contact}}".
 *
 * @property int $id
 * @property string $nom
 * @property string $email
 * @property string $telephone
 * @property string $adresse
 * @property int $country_id
 * @property bool $is_deleted
 *
 * @property Country $country
 */
class Contact extends ActiveRecord
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
            [['is_deleted'], 'boolean'],
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
            'is_deleted' => 'Deleted',
        ];
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery
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

    /**
     * Finds a deleted model based on its primary key value.
     * @param int $id
     * @return static|null
     */
    public static function findDeleted($id)
    {
        return static::findOne(['id' => $id, 'is_deleted' => true]);
    }

    /**
     * Soft deletes the current model.
     * @return bool whether the soft delete was successful.
     */
    public function softDelete()
    {
        $this->is_deleted = true;
        return $this->save(false, ['is_deleted']);
    }

    /**
     * Overrides the default delete method to perform a soft delete.
     * @return bool whether the soft delete was successful.
     */
    public function delete()
    {
        return $this->softDelete();
    }

    /**
     * Restores a soft deleted model.
     * @return bool whether the restoration was successful.
     */
    public function restore()
    {
        $this->is_deleted = false;
        return $this->save(false, ['is_deleted']);
    }

    public static function findById($id)
    {
        $contact = static::findOne(['id' => $id]);

        if ($contact){
            return $contact;
        }

        return null;
    }

    public function search($params)
    {
        $query = Contact::find()->with('country');

        // Configuration de la recherche avec filtres, tri, pagination, etc.
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            // Ajoutez d'autres configurations de pagination si nécessaire
        ]);

        // Charger les paramètres de la requête avec les données de filtrage
        $this->load($params);

        // Valider les données entrantes si nécessaire
        if (!$this->validate()) {
            // retourner les données avec validation échouée ou autres actions nécessaires
            return $dataProvider;
        }

        // Appliquer les filtres de recherche
        $query->andFilterWhere(['like', 'nom', $this->nom])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'adresse', $this->adresse]);

        return $dataProvider;
    }

}
