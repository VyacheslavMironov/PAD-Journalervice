<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%user_relation}}`.
 */
class m221014_063238_create_user_relation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_relation}}', [
            'id' => Schema::TYPE_PK,

            // Идентификатор студента.
            'child_id' => Schema::TYPE_BIGINT.' NOT NULL UNIQUE',

            // Идентификатор родителя.
            'parent_id' => Schema::TYPE_BIGINT,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_relation}}');
    }
}
