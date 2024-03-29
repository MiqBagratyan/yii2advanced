<?php

namespace frontend\controllers;

use frontend\models\Clubs;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClubsController implements the CRUD actions for Clubs model.
 */
class ClubsController extends Controller
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

    /**
     * Lists all Clubs models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Clubs::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'club_id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Clubs model.
     * @param int $club_id Club ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($club_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($club_id),
        ]);
    }

    /**
     * Creates a new Clubs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Clubs();
        $model->beforeSave($this->request->post());
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'club_id' => $model->club_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Clubs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $club_id Club ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($club_id)
    {
        $model = $this->findModel($club_id);
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'club_id' => $model->club_id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Clubs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $club_id Club ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($club_id)
    {
        $this->findModel($club_id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Clubs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $club_id Club ID
     * @return Clubs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($club_id)
    {
        if (($model = Clubs::findOne(['club_id' => $club_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
