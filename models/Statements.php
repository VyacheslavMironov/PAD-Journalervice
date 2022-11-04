<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "statements".
 *
 * @property int $id
 * @property int $user_id
 * @property int $lesson_id
 * @property int $user_from
 * @property string|null $evaluation_type
 * @property string $value
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Lessons $lesson
 * @property Users $user
 * @property Users $userFrom
 */
class Statements extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'statements';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'lesson_id', 'user_from', 'value'], 'required'],
            [['user_id', 'lesson_id', 'user_from'], 'default', 'value' => null],
            [['user_id', 'lesson_id', 'user_from'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['evaluation_type'], 'string', 'max' => 45],
            [['value'], 'string', 'max' => 12],
            [['lesson_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lessons::class, 'targetAttribute' => ['lesson_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['user_id' => 'id']],
            [['user_from'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['user_from' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'lesson_id' => 'Lesson ID',
            'user_from' => 'User From',
            'evaluation_type' => 'Evaluation Type',
            'value' => 'Value',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Lesson]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLesson()
    {
        return $this->hasOne(Lessons::class, ['id' => 'lesson_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['id' => 'user_id']);
    }

    /**
     * Gets query for [[UserFrom]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserFrom()
    {
        return $this->hasOne(Users::class, ['id' => 'user_from']);
    }
}
