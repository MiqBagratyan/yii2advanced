<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "club_clients".
 *
 * @property int $client_id
 * @property int $club_id
 *
 * @property Clients $client
 * @property clubs $club
 */
class ClubsClients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'club_clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // ... other rules ...
            [['club_ids'], 'each', 'rule' => ['integer']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'client_id' => 'Client ID',
            'club_id' => 'Club ID',
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::class, ['client_id' => 'client_id']);
    }

    /**
     * Gets query for [[Club]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClub()
    {
        return $this->hasOne(clubs::class, ['club_id' => 'club_id']);
    }
}
