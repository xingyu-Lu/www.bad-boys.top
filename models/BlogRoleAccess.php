<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog_role_access".
 *
 * @property int $id
 * @property int $role_id 角色id
 * @property int $access_ids 权限id
 * @property int $created_time
 * @property int $updated_time
 */
class BlogRoleAccess extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_role_access';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_id', 'create_time', 'update_time'], 'integer'],
            ['access_ids', 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'Role ID',
            'access_ids' => 'Access IDS',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
