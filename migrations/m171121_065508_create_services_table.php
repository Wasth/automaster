<?php

use yii\db\Migration;

/**
 * Handles the creation of table `services`.
 */
class m171121_065508_create_services_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('services', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'date' => $this->date(),
            'max_order' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('services');
    }
}
