<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%service_event}}`.
 */
class m221014_081559_create_service_event_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%service_event}}', [
            'id' => Schema::TYPE_PK,

            // Итрока ссылается на идентификатор таблицы организации.
            'user_id' => Schema::TYPE_BIGINT.' NOT NULL',

            // Итрока ссылается на идентификатор таблицы организации.
            'organization_id' => Schema::TYPE_BIGINT.' NOT NULL',

            // Ссылается на идентификатор таблицы филиала организации.
            'filial_id' => Schema::TYPE_BIGINT.' NOT NULL',

            // Строка описывающая тип события.
            'event_type' => Schema::TYPE_CHAR."(255) CHECK(
              event_type IN (
                'Система', 'Событие', 'Сообщение')
            ) NOT NULL",

            // Заголовок сообщения.
            'title' => Schema::TYPE_STRING.'(300) NOT NULL',

            // Содержимое сообщения.
            'body' => Schema::TYPE_TEXT.' NOT NULL',

            // Видел ли пользователь сообщение.
            'is_view' => Schema::TYPE_BOOLEAN.' DEFAULT false',

            // Дата и время создания/последнего обновления.
            'created_at' => Schema::TYPE_DATETIME.' DEFAULT NOW()::timestamp',
        ]);

        $this->createIndex(
            'idx-service_event-user_id',
            'service_event',
            'user_id'
        );

        $this->addForeignKey(
            'fk-service_event-user_id',
            'service_event',
            'user_id',
            'users',
            'id'
        );

        $this->createIndex(
            'idx-service_event-organization_id',
            'service_event',
            'organization_id'
        );

        $this->addForeignKey(
            'fk-service_event-organization_id',
            'service_event',
            'organization_id',
            'organization',
            'id'
        );

        $this->createIndex(
            'idx-service_event-filial_id',
            'service_event',
            'filial_id'
        );

        $this->addForeignKey(
            'fk-service_event-filial_id',
            'service_event',
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
        $this->dropTable('{{%service_event}}');
    }
}
