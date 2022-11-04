<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_relation".
 *
 * @property int $id
 * @property int $child_id
 * @property int|null $parent_id
 */
class UserRelation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_relation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['child_id'], 'required'],
            [['child_id', 'parent_id'], 'default', 'value' => null],
            [['child_id', 'parent_id'], 'integer'],
            [['child_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'child_id' => 'Child ID',
            'parent_id' => 'Parent ID',
        ];
    }
}
