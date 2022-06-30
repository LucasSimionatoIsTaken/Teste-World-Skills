<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jobs".
 *
 * @property int $id
 * @property string $job
 *
 * @property Competences[] $competences
 * @property Jobcomps[] $jobcomps
 * @property Userjobs[] $userjobs
 */
class Jobs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jobs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['job'], 'required'],
            [['job'], 'string', 'max' => 8000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'job' => 'Job',
        ];
    }

    /**
     * Gets query for [[Competences]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompetences()
    {
        return $this->hasMany(Competences::className(), ['job_id' => 'id']);
    }

    /**
     * Gets query for [[Jobcomps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJobcomps()
    {
        return $this->hasMany(Jobcomps::className(), ['idJob' => 'id']);
    }

    /**
     * Gets query for [[Userjobs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserjobs()
    {
        return $this->hasMany(Userjobs::className(), ['idJob' => 'id']);
    }
}
