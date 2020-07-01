<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog_access".
 *
 * @property int $id
 * @property string $title 权限名称
 * @property string $urls
 * @property int $status 状态 1：有效 0：无效
 * @property int $type 类型 0：菜单 1：页面 2：ajax
 * @property int $created_time
 * @property int $updated_time
 */
class BlogAccess extends \yii\db\ActiveRecord
{
    const NORMAL_STATUS = 0; //有效

    const DISABLE_STATUS = 1; //无效

    const TYPE_0 = 0; //菜单

    const TYPE_1 = 1; //页面

    const TYPE_2 = 2; //ajax

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_access';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'type', 'create_time', 'update_time', 'parents_id'], 'integer'],
            [['title', 'urls', 'status', 'type', 'parents_id'], 'required'],
            [['title'], 'string', 'max' => 50],
            [['urls'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'urls' => 'Urls',
            'status' => 'Status',
            'type' => 'Type',
            'parents_id' => '所属上级',
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

    public function getTypeList()
    {
        $arr = [
            self::TYPE_0 => '菜单',
            self::TYPE_1 => '页面',
            self::TYPE_2 => 'ajax',
        ];

        return $arr;
    }
}
