<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service_event".
 *
 * @property int $id
 * @property int $user_id
 * @property int $organization_id
 * @property int $filial_id
 * @property string $event_type
 * @property string $title
 * @property string $body
 * @property bool|null $is_view
 * @property string|null $created_at
 *
 * @property Filial $filial
 * @property Organization $organization
 * @property Users $user
 */
class ServiceEvent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'organization_id', 'filial_id', 'event_type', 'title', 'body'], 'required'],
            [['user_id', 'organization_id', 'filial_id'], 'default', 'value' => null],
            [['user_id', 'organization_id', 'filial_id'], 'integer'],
            [['body'], 'string'],
            [['is_view'], 'boolean'],
            [['created_at'], 'safe'],
            [['event_type'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 300],
            [['filial_id'], 'exist', 'skipOnError' => true, 'targetClass' => Filial::class, 'targetAttribute' => ['filial_id' => 'id']],
            [['organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::class, 'targetAttribute' => ['organization_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['user_id' => 'id']],
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
            'organization_id' => 'Organization ID',
            'filial_id' => 'Filial ID',
            'event_type' => 'Event Type',
            'title' => 'Title',
            'body' => 'Body',
            'is_view' => 'Is View',
            'created_at' => 'Created At',
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
     * Gets query for [[Organization]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::class, ['id' => 'organization_id']);
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
}
