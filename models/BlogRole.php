<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog_role".
 *
 * @property int $id
 * @property string $name 角色名称
 * @property int $status 状态 1：有效 0：无效
 * @property int $created_time
 * @property int $updated_time
 */
class BlogRole extends \yii\db\ActiveRecord
{
    const NORMAL_STATUS = 0;

    const DISABLE_STATUS = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'create_time', 'update_time'], 'integer'],
            [['status', 'name'], 'required'],
            [['name'], 'string', 'max' => 50],
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
            'status' => 'Status',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
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
}
