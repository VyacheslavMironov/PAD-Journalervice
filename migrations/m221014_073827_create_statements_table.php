<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%statements}}`.
 */
class m221014_073827_create_statements_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%statements}}', [
            'id' => Schema::TYPE_PK,

            // Идентификатор пользователя, которому принадлежит оценка.
            'user_id' => Schema::TYPE_BIGINT.' NOT NULL',

            // Идентификатор предмета.
            'lesson_id' => Schema::TYPE_BIGINT.' NOT NULL',

            // Кто ставил оценку.
            'user_from' => Schema::TYPE_BIGINT.' NOT NULL',

            // Тип оценки
            'evaluation_type' => Schema::TYPE_CHAR."(45) CHECK(
              evaluation_type IN ('Ежедневная', 'Годовая', 'Контрольная', 'За четверть', 'Экзаменационная',
                'За семестр', 'Итоговая', 'За дисциплину', 'За поведение')
            )",

            // Значение оценки.
            'value' => Schema::TYPE_CHAR.'(12) NOT NULL',
            
            // За какой день.
            'day' => Schema::TYPE_CHAR.'(2) NOT NULL',
            
            // за какой месяц.
            'month' => Schema::TYPE_CHAR.'(2) NOT NULL',
            
            // За какой год.
            'year' => Schema::TYPE_CHAR.'(4) NOT NULL',

            // Дата и время проставления оценки.
            'created_at' => Schema::TYPE_DATE.' DEFAULT NOW()::timestamp',

            // Доследнее время и дата проставления оценки.
            'updated_at' => Schema::TYPE_DATE.' DEFAULT NOW()::timestamp',
        ]);

        $this->createIndex(
            'idx-statements-user_id',
            'statements',
            'user_id'
        );

        $this->addForeignKey(
            'fk-statements-user_id',
            'statements',
            'user_id',
            'users',
            'id'
        );

        $this->createIndex(
            'idx-statements-lesson_id',
            'statements',
            'lesson_id'
        );

        $this->addForeignKey(
            'fk-statements-lesson_id',
            'statements',
            'lesson_id',
            'lessons',
            'id'
        );

        $this->createIndex(
            'idx-statements-user_from',
            'statements',
            'user_from'
        );

        $this->addForeignKey(
            'fk-statements-user_from',
            'statements',
            'user_from',
            'users',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%statements}}');
    }
}
