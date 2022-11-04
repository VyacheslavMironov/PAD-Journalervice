<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%user_group}}`.
 */
class m221014_085745_create_user_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_group}}', [
            'id' => Schema::TYPE_PK,

            // Идентификатор пользователя.
            'user_id' => Schema::TYPE_BIGINT.' NOT NULL',

            // Ссылается на идентификатор таблицы группы филиала организации.
            'group_id' => Schema::TYPE_BIGINT.' NOT NULL',

            // Дата и время создания/последнего обновления.
            'created_at' => Schema::TYPE_DATETIME.' DEFAULT NOW()::timestamp',
        ]);

        $this->createIndex(
            'idx-user_group-user_id',
            'user_group',
            'user_id'
        );
        
        $this->addForeignKey(
            'fk-user_group-user_id',
            'user_group',
            'user_id',
            'users',
            'id'
        );

        $this->createIndex(
            'idx-user_group-group_id',
            'user_group',
            'group_id'
        );

        $this->addForeignKey(
            'fk-user_group-group_id',
            'user_group',
            'group_id',
            'group',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_group}}');
    }
}
