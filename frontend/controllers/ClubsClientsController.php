<?php

namespace frontend\controllers;

use frontend\models\ClubsClients;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClubsClientsController implements the CRUD actions for ClubsClients model.
 */
class ClubsClientsController extends Controller
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
     * Lists all ClubsClients models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ClubsClients::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'client_id' => SORT_DESC,
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
     * Displays a single ClubsClients model.
     * @param int $client_id Client ID
     * @param int $club_id Club ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($client_id, $club_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($client_id, $club_id),
        ]);
    }

    /**
     * Creates a new ClubsClients model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ClubsClients();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'client_id' => $model->client_id, 'club_id' => $model->club_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ClubsClients model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $client_id Client ID
     * @param int $club_id Club ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($client_id, $club_id)
    {
        $model = $this->findModel($client_id, $club_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'client_id' => $model->client_id, 'club_id' => $model->club_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ClubsClients model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $client_id Client ID
     * @param int $club_id Club ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($client_id, $club_id)
    {
        $this->findModel($client_id, $club_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ClubsClients model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $client_id Client ID
     * @param int $club_id Club ID
     * @return ClubsClients the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($client_id, $club_id)
    {
        if (($model = ClubsClients::findOne(['client_id' => $client_id, 'club_id' => $club_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
