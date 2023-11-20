<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pictures}}`.
 */
class m231119_155700_create_pictures_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pictures}}', [
            'id' => $this->primaryKey(),
            'picture_id' => $this->integer()->unique(),
            'is_approved' => $this->boolean(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pictures}}');
    }
}
