<?php

namespace app\controllers;

use app\models\Competences;
use app\models\Jobcomps;
use app\models\Jobs;
use app\models\Levels;
use app\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class JobController extends Controller
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

    public function actionView($id)
    {
        $job = (new Jobs())->find()->where(['id' => (int)$id])->one();
        $jobComps = (new Jobcomps())->find()->where(['idJob' => $job->id])->all();
        $levels = (new Levels())->find()->all();
        $modelUser = new User();
        $Comps = [];
        foreach($jobComps as $tmp) {
            $Comps[] = [
                'competence'=> (new Competences())->find()->where(['id' => $tmp->idCom])->one()
            ];
        }
        return $this->render('view', [
            'job' => $job,
            'user' => $modelUser,
            'comps' => $Comps,
            'levels' => $levels
        ]);
    }
}
