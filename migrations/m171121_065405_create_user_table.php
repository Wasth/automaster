<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m171121_065405_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'full_name' => $this->text(),
            'email' => $this->string(),
            'login' => $this->string(),
            'pass' => $this->string(),
            'image' => $this->string(),
            'isAdmin' => $this->integer()->defaultValue(0),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
