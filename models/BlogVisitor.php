<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog_visitor".
 *
 * @property int $id
 * @property int $ip ip
 * @property string $ua ua
 * @property int $create_time
 */
class BlogVisitor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_visitor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ip', 'create_time'], 'integer'],
            [['ua'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip' => 'Ip',
            'ua' => 'Ua',
            'create_time' => 'Create Time',
        ];
    }
}
