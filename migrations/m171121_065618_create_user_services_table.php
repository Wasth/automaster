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
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_services');
    }
}
