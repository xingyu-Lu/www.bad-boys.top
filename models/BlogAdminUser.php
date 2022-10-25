<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog_admin_user".
 *
 * @property int $id
 * @property string $name 姓名
 * @property string $email 邮箱
 * @property string $password 密码
 * @property int $status 0:有效；1：无效
 * @property int $is_admin 0:管理员；1：超级管理员
 * @property int $role_id
 * @property int $create_time
 * @property int $update_time
 */
class BlogAdminUser extends \yii\db\ActiveRecord
{
    public $verify_code;

    const NORMAL_STATUS = 0;

    const DISABLE_STATUS = 1;

    const ADMIN_STATUS = 1;

    const ADMIN_NOT_STATUS = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_admin_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'password', 'verify_code'], 'required'],
            [['id', 'status', 'role_id', 'is_admin', 'create_time', 'update_time'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['email'], 'email'],
            [['password'], 'string', 'max' => 32],
            [['id'], 'unique'],
            [['verify_code'], 'captcha', 'captchaAction'=>'admin/site/captcha'],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['login'] = ['email', 'password', 'verify_code'];
        $scenarios['edit'] = ['name', 'email'];
        $scenarios['pwd_reset'] = ['password'];
        $scenarios['create_admin_user'] = ['id', 'name', 'email', 'password', 'status', 'create_time', 'update_time'];

        return $scenarios;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'status' => 'Status',
            'is_admin' => 'Is Admin',
            'role_id' => 'Role Id',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'verify_code' => 'Verify Code',
        ];
    }

    public function getStatusList()
    {
        $arr = [
            self::NORMAL_STATUS => '正常',
            self::DISABLE_STATUS => '封禁'
        ];

        return $arr;
    }

    public function getAdminStatusList()
    {
        $arr = [
            self::ADMIN_NOT_STATUS => '管理员',
            self::ADMIN_STATUS => '超级管理员',
        ];

        return $arr;
    }
}
