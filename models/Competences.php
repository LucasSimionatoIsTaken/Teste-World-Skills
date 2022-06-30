<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "competences".
 *
 * @property int $id
 * @property string $competence
 * @property int $height
 * @property int $job_id
 *
 * @property Jobs $job
 * @property Jobcomps[] $jobcomps
 * @property Usercomps[] $usercomps
 */
class Competences extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'competences';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['competence', 'height', 'job_id'], 'required'],
            [['height', 'job_id'], 'integer'],
            [['competence'], 'string', 'max' => 8000],
            [['job_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jobs::className(), 'targetAttribute' => ['job_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'competence' => 'Competence',
            'height' => 'Height',
            'job_id' => 'Job ID',
        ];
    }

    /**
     * Gets query for [[Job]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(Jobs::className(), ['id' => 'job_id']);
    }

    /**
     * Gets query for [[Jobcomps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJobcomps()
    {
        return $this->hasMany(Jobcomps::className(), ['idCon' => 'id']);
    }

    /**
     * Gets query for [[Usercomps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsercomps()
    {
        return $this->hasMany(Usercomps::className(), ['idComp' => 'id']);
    }
}
