<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%schedule}}`.
 */
class m221014_090245_create_schedule_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%schedule}}', [
            'id' => Schema::TYPE_PK,

            // Строка ссылается на идентификатор таблицы организации.
            'organization_id' => Schema::TYPE_BIGINT,

            // Ссылается на идентификатор таблицы филиала организации.
            'filial_id' => Schema::TYPE_BIGINT.' NOT NULL',

            // Идентификатор предмета.
            'lesson_id' => Schema::TYPE_BIGINT.' NOT NULL',

            // Идентификатор группы.
            'group_id' => Schema::TYPE_BIGINT.' NOT NULL',

            // Дата проведения предмета.
            'date_from' => Schema::TYPE_DATE.' NOT NULL',

            // Время начала предмета.
            'time_to' => Schema::TYPE_TIME.' NOT NULL',

            // Время окончания предмета
            'time_end' => Schema::TYPE_TIME.' NOT NULL',
        ]);

        $this->createIndex(
            'idx-schedule-organization_id',
            'schedule',
            'organization_id'
        );

        $this->addForeignKey(
            'fk-schedule-organization_id',
            'schedule',
            'organization_id',
            'organization',
            'id'
        );

        $this->createIndex(
            'idx-schedule-filial_id',
            'schedule',
            'filial_id'
        );

        $this->addForeignKey(
            'fk-schedule-filial_id',
            'schedule',
            'filial_id',
            'filial',
            'id'
        );

        $this->createIndex(
            'idx-schedule-lesson_id',
            'schedule',
            'lesson_id'
        );

        $this->addForeignKey(
            'fk-schedule-lesson_id',
            'schedule',
            'lesson_id',
            'lessons',
            'id'
        );

        $this->createIndex(
            'idx-schedule-group_id',
            'schedule',
            'group_id'
        );

        $this->addForeignKey(
            'fk-schedule-group_id',
            'schedule',
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
        $this->dropTable('{{%schedule}}');
    }
}
