<?php

namespace frontend\models;

use Yii;
use yii\db\Expression;
use frontend\models\Clients;

/**
 * This is the model class for table "club".
 *
 * @property int $club_id
 * @property string $name
 * @property string $adress
 * @property string $create_date
 * @property int|null $create_user_id
 * @property string $update_date
 * @property int|null $update_user_id
 * @property string|null $delete_date
 * @property int|null $delete_user_id
 */
class clubs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'club';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'adress'], 'required'],
            [['adress'], 'string'],
            [['create_date', 'update_date', 'delete_date'], 'safe'],
            [['create_user_id', 'update_user_id', 'delete_user_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'club_id' => 'Club ID',
            'name' => 'Name',
            'adress' => 'Adress',
            'create_date' => 'Create Date',
            'create_user_id' => 'Create User ID',
            'update_date' => 'Update Date',
            'update_user_id' => 'Update User ID',
            'delete_date' => 'Delete Date',
            'delete_user_id' => 'Delete User ID',
        ];
    }
    public function beforeSave($insert)
    {
        if ( parent::beforeSave($insert)){
            if ($insert){
                $this->create_user_id = Yii::$app->user->id;
                $this->create_date = new Expression('NOW()');
            }else{
                $this->update_user_id = Yii::$app->user->id;
                $this->update_date = new Expression('NOW()');
            }
            return true;
        }else{
            return var_dump('gfbbf');
        }
    }
    public function getClients()
    {
        return $this->hasMany(Clients::class, ['client_id' => 'client_id'])
            ->viaTable('client_club', ['club_id' => 'id']);
    }
}
