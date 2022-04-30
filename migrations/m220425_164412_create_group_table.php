<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%group}}`.
 */
class m220425_164412_create_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%group}}', [
            'id' => $this->primaryKey(),
            'grade_id' => $this->integer()->notNull(),
            'number' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%group}}');
    }
}
