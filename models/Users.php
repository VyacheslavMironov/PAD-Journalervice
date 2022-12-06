<?php

namespace app\models;

use Yii;
use \damirka\JWT\UserTrait;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property int $organization_id
 * @property int|null $filial_id
 * @property int|null $relation_id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $middle_name
 * @property string $email
 * @property string $role
 * @property bool|null $is_active
 * @property string|null $avatar
 * @property string|null $email_code
 * @property string|null $password
 * @property string|null $created_at
 *
 * @property AccessKey[] $accessKeys
 * @property Filial $filial
 * @property Lessons[] $lessons
 * @property Organization $organization
 * @property ServiceEvent[] $serviceEvents
 * @property Statements[] $statements
 * @property Statements[] $statements0
 * @property TeacherFromLessons[] $teacherFromLessons
 * @property UserGroup[] $userGroups
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['organization_id', 'first_name', 'last_name', 'email', 'role'], 'required'],
            [['organization_id', 'filial_id', 'relation_id'], 'default', 'value' => null],
            [['organization_id', 'filial_id', 'relation_id'], 'integer'],
            [['is_active'], 'boolean'],
            [['created_at'], 'safe'],
            [['first_name', 'last_name', 'middle_name', 'email'], 'string', 'max' => 255],
            [['role'], 'string', 'max' => 100],
            [['avatar'], 'string', 'max' => 300],
            [['email_code'], 'string', 'max' => 12],
            [['password'], 'string', 'max' => 25],
            [['email'], 'unique'],
            [['filial_id'], 'exist', 'skipOnError' => true, 'targetClass' => Filial::class, 'targetAttribute' => ['filial_id' => 'id']],
            [['organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::class, 'targetAttribute' => ['organization_id' => 'id']],
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
            'relation_id' => 'Relation ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'middle_name' => 'Middle Name',
            'email' => 'Email',
            'role' => 'Role',
            'is_active' => 'Is Active',
            'avatar' => 'Avatar',
            'email_code' => 'Email Code',
            'password' => 'Password',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[AccessKeys]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccessKeys()
    {
        return $this->hasMany(AccessKey::class, ['user_id' => 'id']);
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
     * Gets query for [[Lessons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLessons()
    {
        return $this->hasMany(Lessons::class, ['teacher_id' => 'id']);
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
     * Gets query for [[ServiceEvents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServiceEvents()
    {
        return $this->hasMany(ServiceEvent::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Statements]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatements()
    {
        return $this->hasMany(Statements::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Statements0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatements0()
    {
        return $this->hasMany(Statements::class, ['user_from' => 'id']);
    }

    /**
     * Gets query for [[TeacherFromLessons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacherFromLessons()
    {
        return $this->hasMany(TeacherFromLessons::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[UserGroups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserGroups()
    {
        return $this->hasMany(UserGroup::class, ['user_id' => 'id']);
    }

    /* Тут просто скопировал со стандартной модели */ 
    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     * @param \Lcobucci\JWT\Token $token
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['id'] === (string) $token->getClaim('uid')) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    // Добавление getSecretKey
    
    // Override this method
    protected static function getSecretKey()
    {
        return 'someSecretKey';
    }

    // And this one if you wish
    protected static function getHeaderToken()
    {
        return [];
    }

}
