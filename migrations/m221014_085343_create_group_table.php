<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%group}}`.
 */
class m221014_085343_create_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%group}}', [
            'id' => Schema::TYPE_PK,

            // Итрока ссылается на идентификатор таблицы организации.
            'organization_id' => Schema::TYPE_BIGINT.' NOT NULL',

            // Ссылается на идентификатор таблицы филиала организации.
            'filial_id' => Schema::TYPE_BIGINT.' NOT NULL',

            // Наименование группы.
            'name' => Schema::TYPE_STRING.'(300) NOT NULL',

            // Дата и время создания/последнего обновления.
            'created_at' => Schema::TYPE_DATETIME.' DEFAULT NOW()::timestamp',
        ]);

        $this->createIndex(
            'idx-group-organization_id',
            'group',
            'organization_id'
        );

        $this->addForeignKey(
            'fk-group-organization_id',
            'group',
            'organization_id',
            'organization',
            'id'
        );

        $this->createIndex(
            'idx-group-filial_id',
            'group',
            'filial_id'
        );

        $this->addForeignKey(
            'fk-group-filial_id',
            'group',
            'filial_id',
            'filial',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%group}}');
    }
}
