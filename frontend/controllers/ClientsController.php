<?php

namespace frontend\controllers;

use frontend\models\Clients;
use frontend\models\clubs;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**
 * ClientsController implements the CRUD actions for Clients model.
 */
class ClientsController extends Controller
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
     * Lists all Clients models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Clients::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'client_id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Clients model.
     * @param int $client_id Client ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($client_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($client_id),
        ]);
    }

    /**
     * Creates a new Clients model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
//    public function actionCreate()
//    {
//        $model = new Clients();
//
//        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'client_id' => $model->client_id]);
//        }
////        var_dump($model->getErrors());die;
//
//        return $this->render('create', ['model' => $model]);
//    }
    public function actionCreate()
    {
        $model = new Clients();

        if ($this->request->isPost) {
            $post = $this->request->post();

            if ($model->load($post) && $model->save()) {
                return $this->redirect(['view', 'client_id' => $model->client_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'clubsList' => \yii\helpers\ArrayHelper::map(clubs::find()->all(), 'club_id', 'name'),
        ]);
    }



    /**
     * Updates an existing Clients model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $client_id Client ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($client_id)
    {
        $model = $this->findModel($client_id);
        $model -> beforeSave($this->request->post());

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
//            var_dump($model);die;
            return $this->redirect(['view', 'client_id' => $model->client_id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Clients model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $client_id Client ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($client_id)
    {
        $this->findModel($client_id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Clients model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $client_id Client ID
     * @return Clients the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($client_id)
    {
        if (($model = Clients::findOne(['client_id' => $client_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
