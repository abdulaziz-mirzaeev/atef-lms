<?php

use yii\db\Migration;

/**
 * Class m220430_174907_alter_middle_name_column_in_person_table
 */
class m220430_174907_alter_middle_name_column_in_person_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('person', 'middle_name', $this->string()->null()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('person', 'middle_name', $this->string()->notNull());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220430_174907_alter_middle_name_column_in_person_table cannot be reverted.\n";

        return false;
    }
    */
}
