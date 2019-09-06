<?php

namespace app\models;

use Yii;
/**
 * This is the model class for table "{{%db_articles}}".
 *
 * @property int $id
 * @property string $content 文章内容
 * @property int $status 0:公开；1:私密
 * @property int $create_time
 * @property int $update_time
 */
class Articles extends \yii\db\ActiveRecord
{
    const PUBLIC_YSE = 0; //公开
    const PUBLIC_NO = 1; //私密

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'db_articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['status', 'create_time', 'update_time'], 'integer'],
            [['content'], 'string', 'max' => 2000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'status' => 'Status',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    public function getStatusList()
    {
       return [
           self::PUBLIC_YSE => '公开',
           self::PUBLIC_NO => '私密'
       ];
    }
}
