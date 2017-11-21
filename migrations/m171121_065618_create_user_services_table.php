<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_services`.
 */
class m171121_065618_create_user_services_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_services', [
            'id' => $this->primaryKey(),
            'serviceId' => $this->integer(),
            'userId' => $this->integer(),
        ]);
        $this->createIndex('serviceIdIndex','user_services','serviceId');
        $this->addForeignKey('serviceIdForeignKey',
            'user_services','serviceId',
            'services','id');
        $this->createIndex('userIdIndex','user_services','userId');
        $this->addForeignKey('userIdForeignKey',
            'user_services','userId',
            'user','id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_services');
    }
}
