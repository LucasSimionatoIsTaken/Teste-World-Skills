<?php

use yii\db\Migration;

/**
 * Class m220630_173702_VagaConLvl
 */
class m220630_173702_VagaConLvl extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('JobComps', [
            'id' => $this->primaryKey(),
            'idCon' => $this->integer()->notNull(),
            'idLvl' => $this->integer()->notNull(),
            'idJob' => $this->integer()->notNull()
        ]);

        $this->addForeignKey('fk_job', 'JobComps', 'idJob', 'Jobs', 'id', 'CASCADE');
        $this->addForeignKey('fk_Lvl', 'JobComps', 'idLvl', 'levels', 'id', 'CASCADE');
        $this->addForeignKey('fk_Con', 'JobComps', 'idCon', 'competences', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220630_173702_VagaConLvl cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220630_173702_VagaConLvl cannot be reverted.\n";

        return false;
    }
    */
}
