<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%club}}`.
 */
class m240221_104934_create_club_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%club}}', [
            'club_id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'adress' => $this->text()->notNull(),
            'create_date' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'create_user_id' => $this->integer(),
            'update_date' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            'update_user_id' => $this->integer(),
            'delete_date' => $this->dateTime(),
            'delete_user_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%club}}');
    }
}
