<?php


namespace frontend\controllers;
use frontend\models\Clients;
use frontend\models\clubs;
use frontend\models\ClubsClients;

class ClubssClientsController extends Controller
{
    public function actionView($clientId)
    {
        // Retrieve client
        $client = Clients::findOne($clientId);

        // Get all clubs associated with the client
        $clubs = $client->clubs;

        // Or, associate a new club with the client
        $club = new Clubs();
        $club->name = 'New Club';
        $club->save();
        $client->link('clubs', $club); // Associate the new club with the client

        // Render your view or perform other actions
        return $this->render('view', ['client' => $client, 'clubs' => $clubs]);
    }
//    public function actionYourAction()
//    {
//        $model = new ClubsClients();
//
//        if ($model->load(Yii::$app->request->post())) {
//            // $model->club_ids will contain an array of selected club IDs
//            // Handle the selected clubs as needed
//
//            // ... rest of your code ...
//        }
//
//        return $this->render('your_view', ['model' => $model, 'clubsList' => $clubsList]);
//    }
}