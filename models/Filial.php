<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "filial".
 *
 * @property int $id
 * @property int $admin_id
 * @property int $organization_id
 * @property string $name
 * @property int $settings_filial_id
 *
 * @property Group[] $groups
 * @property Lessons[] $lessons
 * @property Schedule[] $schedules
 * @property ServiceEvent[] $serviceEvents
 * @property SettingsFilial $settingsFilial
 * @property TeacherFromLessons[] $teacherFromLessons
 * @property Users[] $users
 */
class Filial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'filial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['admin_id', 'organization_id', 'name', 'settings_filial_id'], 'required'],
            [['admin_id', 'organization_id', 'settings_filial_id'], 'default', 'value' => null],
            [['admin_id', 'organization_id', 'settings_filial_id'], 'integer'],
            [['name'], 'string', 'max' => 300],
            [['settings_filial_id'], 'unique'],
            [['settings_filial_id'], 'exist', 'skipOnError' => true, 'targetClass' => SettingsFilial::class, 'targetAttribute' => ['settings_filial_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'admin_id' => 'Admin ID',
            'organization_id' => 'Organization ID',
            'name' => 'Name',
            'settings_filial_id' => 'Settings Filial ID',
        ];
    }

    /**
     * Gets query for [[Groups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Group::class, ['filial_id' => 'id']);
    }

    /**
     * Gets query for [[Lessons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLessons()
    {
        return $this->hasMany(Lessons::class, ['filial_id' => 'id']);
    }

    /**
     * Gets query for [[Schedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::class, ['filial_id' => 'id']);
    }

    /**
     * Gets query for [[ServiceEvents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServiceEvents()
    {
        return $this->hasMany(ServiceEvent::class, ['filial_id' => 'id']);
    }

    /**
     * Gets query for [[SettingsFilial]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSettingsFilial()
    {
        return $this->hasOne(SettingsFilial::class, ['id' => 'settings_filial_id']);
    }

    /**
     * Gets query for [[TeacherFromLessons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacherFromLessons()
    {
        return $this->hasMany(TeacherFromLessons::class, ['filial_id' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::class, ['filial_id' => 'id']);
    }
}
