<?php

namespace frontend\models;

use Yii;
use yii\base\BaseObject;
use yii\db\Expression;
use yii\grid\DataColumn;

/**
 * This is the model class for table "client".
 *
 * @property int $client_id
 * @property string $user_name
 * @property string $user_lastname
 * @property string $user_middle_name
 * @property string|null $gender
 * @property string $birthday
 * @property int|null $club_id
 * @property string $create_date
 * @property int|null $create_user_id
 * @property string $update_date
 * @property int|null $update_user_id
 * @property string|null $delete_date
 * @property int|null $delete_user_id
 */
class Clients extends \yii\db\ActiveRecord
{
    public $clubs;
//    public $name;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_name', 'user_lastname', 'user_middle_name', 'birthday', 'club_id'], 'required'],
            [['gender'], 'string'],
            [['birthday', 'create_date', 'update_date', 'delete_date'], 'safe'],
            [['create_user_id', 'update_user_id', 'delete_user_id'], 'integer'],
            [['user_name', 'user_lastname', 'user_middle_name'], 'string', 'max' => 255],
//            [['club_id'], 'each', 'rule' => ['integer']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'client_id' => 'Client ID',
            'user_name' => 'User Name',
            'user_lastname' => 'User Lastname',
            'user_middle_name' => 'User Middle Name',
            'gender' => 'Gender',
            'birthday' => 'Birthday',
            'club_id' => 'Name',
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
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->create_user_id = Yii::$app->user->id;
                $this->create_date = new Expression('NOW()');
            } else {
                $this->update_user_id = Yii::$app->user->id;
                $this->update_date = new Expression('NOW()');
            }
            return true;
        } else {
            return var_dump('gfbbf');
        }
    }
    public function getClub()
    {
        return $this->hasOne(clubs::class, ['id' => 'club_id']);
    }
    public function getClubName()
    {
        return $this->club ? $this->club->name : null;
    }
//    public function getClubs()
//    {
//        return $this->hasMany(clubs::class, ['club_id' => 'club_id'])
//            ->viaTable('club_clients', ['client_id' => 'client_id']);
//    }

//    public function beforeDelete()
//    {
//        if (parent::beforeDelete()) {
//            $this->delete_date = new Expression('NOW()');
//            $this->delete_user_id = Yii::$app->user->id;
//            $this->save(false); // Save the record without validation
//            return false; // Prevent the actual deletion
//        } else {
//            return false;
//        }
//    }
}


