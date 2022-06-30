<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usercomps".
 *
 * @property int $id
 * @property int $idComp
 * @property int $idUserJob
 * @property int $idLevel
 *
 * @property Competences $idComp0
 * @property Levels $idLevel0
 * @property Userjobs $idUserJob0
 */
class Usercomps extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usercomps';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idComp', 'idUserJob', 'idLevel'], 'required'],
            [['idComp', 'idUserJob', 'idLevel'], 'integer'],
            [['idComp'], 'exist', 'skipOnError' => true, 'targetClass' => Competences::className(), 'targetAttribute' => ['idComp' => 'id']],
            [['idLevel'], 'exist', 'skipOnError' => true, 'targetClass' => Levels::className(), 'targetAttribute' => ['idLevel' => 'id']],
            [['idUserJob'], 'exist', 'skipOnError' => true, 'targetClass' => Userjobs::className(), 'targetAttribute' => ['idUserJob' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idComp' => 'Id Comp',
            'idUserJob' => 'Id User Job',
            'idLevel' => 'Id Level',
        ];
    }

    /**
     * Gets query for [[IdComp0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdComp0()
    {
        return $this->hasOne(Competences::className(), ['id' => 'idComp']);
    }

    /**
     * Gets query for [[IdLevel0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdLevel0()
    {
        return $this->hasOne(Levels::className(), ['id' => 'idLevel']);
    }

    /**
     * Gets query for [[IdUserJob0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUserJob0()
    {
        return $this->hasOne(Userjobs::className(), ['id' => 'idUserJob']);
    }
}
