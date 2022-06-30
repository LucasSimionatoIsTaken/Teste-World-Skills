<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userjobs".
 *
 * @property int $id
 * @property int $idUser
 * @property int $idJob
 *
 * @property Jobs $idJob0
 * @property User $idUser0
 * @property Usercomps[] $usercomps
 */
class Userjobs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'userjobs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUser', 'idJob'], 'required'],
            [['idUser', 'idJob'], 'integer'],
            [['idJob'], 'exist', 'skipOnError' => true, 'targetClass' => Jobs::className(), 'targetAttribute' => ['idJob' => 'id']],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idUser' => 'Id User',
            'idJob' => 'Id Job',
        ];
    }

    /**
     * Gets query for [[IdJob0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdJob0()
    {
        return $this->hasOne(Jobs::className(), ['id' => 'idJob']);
    }

    /**
     * Gets query for [[IdUser0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'idUser']);
    }

    /**
     * Gets query for [[Usercomps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsercomps()
    {
        return $this->hasMany(Usercomps::className(), ['idUserJob' => 'id']);
    }
}
