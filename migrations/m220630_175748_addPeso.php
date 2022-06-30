<?php

use yii\db\Migration;

/**
 * Class m220630_175748_addPeso
 */
class m220630_175748_addPeso extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('JobComps', 'peso', 'integer');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220630_175748_addPeso cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220630_175748_addPeso cannot be reverted.\n";

        return false;
    }
    */
}
