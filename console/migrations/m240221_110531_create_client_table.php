<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%client}}`.
 */
class m240221_110531_create_client_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%clients}}', [
            'client_id' => $this->primaryKey(),
            'user_name' => $this->string()->notNull(),
            'user_lastname' => $this->string()->notNull(),
            'user_middle_name' => $this->string()->notNull(),
            'gender' => $this->smallInteger()->notNull(),//1 for Male,2 for Female
            'birthday' => $this->date()->notNull(),
            'club_id' => $this->integer()->notNull(),
            'create_date' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'create_user_id' => $this->integer()->notNull(),
            'update_date' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            'update_user_id' => $this->integer(),
            'delete_date' => $this->dateTime(),
            'delete_user_id' => $this->integer(),
        ]);

        $this->addForeignKey('fk_clients_club_id', 'clients', 'club_id','club','name');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%clients}}');
    }
}
