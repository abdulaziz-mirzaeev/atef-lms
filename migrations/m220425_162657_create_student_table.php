<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%student}}`.
 */
class m220425_162657_create_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%student}}', [
            'id' => $this->primaryKey(),
            'person_id' => $this->integer()->notNull(),
            'grade_id' => $this->integer(),
            'group_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%student}}');
    }
}
