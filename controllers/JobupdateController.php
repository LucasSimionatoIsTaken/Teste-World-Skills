<?php

namespace app\controllers;

use app\models\Competences;
use app\models\Jobs;
use app\models\Levels;
use app\models\User;
use app\models\Usercomps;
use app\models\Userjobs;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class JobupdateController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }
    
    public function actionIndex()
    {
        $jobs = (new Jobs())->find()->all();
        return $this->render('index', [
            'jobs' => $jobs
        ]);
    }

    public function actionUpdate($id)
    {
        $job = (new Jobs())->find()->where(['id' => (int)$id])->one();
        $modelUser = new User();
        return $this->render('update', [
            'model' => $job,
            'user' => $modelUser
        ]);
    }

    public function actionView($id)
    {
        $job = (new Jobs())->find()->where(['id' => (int)$id])->one();
        $modelUserJobs = (new Userjobs())->find()->where(['idJob' => (int)$id])->all();
        $users = [];
        $userComp = [];
        foreach($modelUserJobs as $userJob) {
            $users[] = (new User())->find()->where(['id' => $userJob->idUser])->one();
        }
        foreach($modelUserJobs as $userJob){
            $temp = (new Usercomps())->find()->where(['idUserJob' => $userJob->id])->all();
            foreach($temp as $tmp) {
                $userComp[] = [
                    'competence'=> (new Competences())->find()->where(['id' => $tmp->idComp])->one(),
                    'level'=> (new Levels())->find()->where(['id' => $tmp->idLevel])->one(),
                    'id' => $tmp->id,
                ];
            }
        }
        return $this->render('view', [
            'model' => $job,
            'users' => $users,
            'userComps' => $userComp
        ]);
    }
}
