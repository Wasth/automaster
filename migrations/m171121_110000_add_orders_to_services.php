<?php

use yii\db\Migration;

class m171121_110000_add_orders_to_services extends Migration
{
    public function safeUp()
    {

    }

    public function safeDown()
    {
        echo "m171121_110000_add_orders_to_services cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('services','orders',$this->integer()->defaultValue(0));
    }

    public function down()
    {
        echo "m171121_110000_add_orders_to_services cannot be reverted.\n";

        return false;
    }

}
