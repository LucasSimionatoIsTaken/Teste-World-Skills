<?php

use yii\db\Migration;

/**
 * Class m220630_174317_UserJob
 */
class m220630_174317_UserJob extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('userJobs', [
            'id' => $this->primaryKey(),
            'idUser' => $this->integer()->notNull(),
            'idJob' => $this->integer()->notNull()
        ]);

        $this->addForeignKey('fk_job2', 'userJobs', 'idJob', 'Jobs', 'id', 'CASCADE');
        $this->addForeignKey('fk_user2', 'userJobs', 'idUser', 'user', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220630_174317_UserJob cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220630_174317_UserJob cannot be reverted.\n";

        return false;
    }
    */
}
