<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%teacher_from_lessons}}`.
 */
class m221014_091727_create_teacher_from_lessons_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%teacher_from_lessons}}', [
            'id' => Schema::TYPE_PK,

            // Ссылается на идентификатор таблицы организации.
            'organization_id' => Schema::TYPE_BIGINT.' NOT NULL',

            // Ссылается на идентификатор таблицы филиала организации.
            'filial_id' => Schema::TYPE_BIGINT.' NOT NULL',

            // Идентификатор пользователя.
            'user_id' => Schema::TYPE_BIGINT.' NOT NULL',

            // Идентификатор предмета.
            'lesson_id' => Schema::TYPE_BIGINT.' NOT NULL',
        ]);

        $this->createIndex(
            'idx-teacher_from_lessons-organization_id',
            'teacher_from_lessons',
            'organization_id'
        );

        $this->addForeignKey(
            'fk-teacher_from_lessons-organization_id',
            'teacher_from_lessons',
            'organization_id',
            'organization',
            'id'
        );

        $this->createIndex(
            'idx-teacher_from_lessons-filial_id',
            'teacher_from_lessons',
            'filial_id'
        );

        $this->addForeignKey(
            'fk-teacher_from_lessons-filial_id',
            'teacher_from_lessons',
            'filial_id',
            'filial',
            'id'
        );

        $this->createIndex(
            'idx-teacher_from_lessons-user_id',
            'teacher_from_lessons',
            'user_id'
        );

        $this->addForeignKey(
            'fk-teacher_from_lessons-user_id',
            'teacher_from_lessons',
            'user_id',
            'users',
            'id'
        );

        $this->createIndex(
            'idx-teacher_from_lessons-lesson_id',
            'teacher_from_lessons',
            'lesson_id'
        );

        $this->addForeignKey(
            'fk-teacher_from_lessons-lesson_id',
            'teacher_from_lessons',
            'lesson_id',
            'lessons',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%teacher_from_lessons}}');
    }
}
