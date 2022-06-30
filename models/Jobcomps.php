<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jobcomps".
 *
 * @property int $id
 * @property int $idCon
 * @property int $idLvl
 * @property int $idJob
 * @property int|null $peso
 *
 * @property Competences $idCon0
 * @property Jobs $idJob0
 * @property Levels $idLvl0
 */
class Jobcomps extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jobcomps';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCon', 'idLvl', 'idJob'], 'required'],
            [['idCon', 'idLvl', 'idJob', 'peso'], 'integer'],
            [['idCon'], 'exist', 'skipOnError' => true, 'targetClass' => Competences::className(), 'targetAttribute' => ['idCon' => 'id']],
            [['idLvl'], 'exist', 'skipOnError' => true, 'targetClass' => Levels::className(), 'targetAttribute' => ['idLvl' => 'id']],
            [['idJob'], 'exist', 'skipOnError' => true, 'targetClass' => Jobs::className(), 'targetAttribute' => ['idJob' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idCon' => 'Id Con',
            'idLvl' => 'Id Lvl',
            'idJob' => 'Id Job',
            'peso' => 'Peso',
        ];
    }

    /**
     * Gets query for [[IdCon0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCon0()
    {
        return $this->hasOne(Competences::className(), ['id' => 'idCon']);
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
     * Gets query for [[IdLvl0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdLvl0()
    {
        return $this->hasOne(Levels::className(), ['id' => 'idLvl']);
    }
}
