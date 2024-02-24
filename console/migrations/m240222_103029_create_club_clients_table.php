<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%club_clients}}`.
 */
class m240222_103029_create_club_clients_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%club_clients}}', [
            'client_id' => $this->integer(),
            'club_id' => $this->integer(),
            'PRIMARY KEY(client_id, club_id)',
            'FOREIGN KEY(client_id) REFERENCES clients(client_id) ON DELETE CASCADE ON UPDATE CASCADE',
            'FOREIGN KEY(club_id) REFERENCES club(club_id) ON DELETE CASCADE ON UPDATE CASCADE',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%club_clients}}');
    }
}
