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
 * @property int $create_time
 * @property int $update_time
 */
class BlogAdminUser extends \yii\db\ActiveRecord
{
    public $verify_code;

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
            [['id', 'name', 'email', 'password', 'verify_code'], 'required'],
            [['id', 'status', 'create_time', 'update_time'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['email'], 'email'],
            [['password'], 'string', 'max' => 32],
            [['id'], 'unique'],
            [['verify_code'], 'myCaptcha'],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['login'] = ['email', 'password', 'verify_code'];
        $scenarios['edit'] = ['name', 'email'];
        $scenarios['pwd_reset'] = ['password'];

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
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'verify_code' => 'Verify Code',
        ];
    }

    public function myCaptcha($attribute)
    {

        if ($this->verify_code != Yii::$app->session->get('__captcha/admin/site/captcha')) {
            return $this->addError($attribute, '验证码错误');
        }

        return true;
    }
}
