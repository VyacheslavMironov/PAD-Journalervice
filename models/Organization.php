<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organization".
 *
 * @property int $id
 * @property string $name
 * @property string|null $destination
 * @property int $settings_id
 *
 * @property Group[] $groups
 * @property Lessons[] $lessons
 * @property Schedule[] $schedules
 * @property ServiceEvent[] $serviceEvents
 * @property Settings $settings
 * @property TeacherFromLessons[] $teacherFromLessons
 * @property Users[] $users
 */
class Organization extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organization';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'settings_id'], 'required'],
            [['settings_id'], 'default', 'value' => null],
            [['settings_id'], 'integer'],
            [['name'], 'string', 'max' => 300],
            [['destination'], 'string', 'max' => 100],
            [['name'], 'unique'],
            [['settings_id'], 'unique'],
            [['settings_id'], 'exist', 'skipOnError' => true, 'targetClass' => Settings::class, 'targetAttribute' => ['settings_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'destination' => 'Destination',
            'settings_id' => 'Settings ID',
        ];
    }

    /**
     * Gets query for [[Groups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Group::class, ['organization_id' => 'id']);
    }

    /**
     * Gets query for [[Lessons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLessons()
    {
        return $this->hasMany(Lessons::class, ['organization_id' => 'id']);
    }

    /**
     * Gets query for [[Schedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::class, ['organization_id' => 'id']);
    }

    /**
     * Gets query for [[ServiceEvents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServiceEvents()
    {
        return $this->hasMany(ServiceEvent::class, ['organization_id' => 'id']);
    }

    /**
     * Gets query for [[Settings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSettings()
    {
        return $this->hasOne(Settings::class, ['id' => 'settings_id']);
    }

    /**
     * Gets query for [[TeacherFromLessons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacherFromLessons()
    {
        return $this->hasMany(TeacherFromLessons::class, ['organization_id' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::class, ['organization_id' => 'id']);
    }
}
