<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property int $id
 * @property int|null $organization_id
 * @property int $filial_id
 * @property int $lesson_id
 * @property int $group_id
 * @property int $teacher_id
 * @property string|null $day_in
 * @property string $time_to
 * @property string $time_end
 *
 * @property Filial $filial
 * @property Group $group
 * @property Lessons $lesson
 * @property Organization $organization
 * @property Users $teacher
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['organization_id', 'filial_id', 'lesson_id', 'group_id', 'teacher_id'], 'default', 'value' => null],
            [['organization_id', 'filial_id', 'lesson_id', 'group_id', 'teacher_id'], 'integer'],
            [['filial_id', 'lesson_id', 'group_id', 'teacher_id', 'time_to', 'time_end'], 'required'],
            [['time_to', 'time_end'], 'safe'],
            [['day_in'], 'string', 'max' => 3],
            [['filial_id'], 'exist', 'skipOnError' => true, 'targetClass' => Filial::class, 'targetAttribute' => ['filial_id' => 'id']],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::class, 'targetAttribute' => ['group_id' => 'id']],
            [['lesson_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lessons::class, 'targetAttribute' => ['lesson_id' => 'id']],
            [['organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::class, 'targetAttribute' => ['organization_id' => 'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['teacher_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'organization_id' => 'Organization ID',
            'filial_id' => 'Filial ID',
            'lesson_id' => 'Lesson ID',
            'group_id' => 'Group ID',
            'teacher_id' => 'Teacher ID',
            'day_in' => 'Day In',
            'time_to' => 'Time To',
            'time_end' => 'Time End',
        ];
    }

    /**
     * Gets query for [[Filial]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFilial()
    {
        return $this->hasOne(Filial::class, ['id' => 'filial_id']);
    }

    /**
     * Gets query for [[Group]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::class, ['id' => 'group_id']);
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
     * Gets query for [[Organization]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::class, ['id' => 'organization_id']);
    }

    /**
     * Gets query for [[Teacher]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Users::class, ['id' => 'teacher_id']);
    }
}
