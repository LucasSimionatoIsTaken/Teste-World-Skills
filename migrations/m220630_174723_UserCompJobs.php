<?php

use yii\db\Migration;

/**
 * Class m220630_174723_UserCompJobs
 */
class m220630_174723_UserCompJobs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('userComps', [
            'id' => $this->primaryKey(),
            'idComp' => $this->integer()->notNull(),
            'idUserJob' => $this->integer()->notNull(),
            'idLevel' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk_job3', 'userComps', 'idComp', 'Competences', 'id', 'CASCADE');
        $this->addForeignKey('fk_level2', 'userComps', 'idLevel', 'levels', 'id', 'CASCADE');
        $this->addForeignKey('fk_user3', 'userComps', 'idUserJob', 'userJobs', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220630_174723_UserCompJobs cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220630_174723_UserCompJobs cannot be reverted.\n";

        return false;
    }
    */
}
