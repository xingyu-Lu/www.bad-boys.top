<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog_pv_uv".
 *
 * @property int $id
 * @property int $day day
 * @property int $pv pv
 * @property int $uv uv
 * @property int $create_time
 * @property int $update_time
 */
class BlogPvUv extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_pv_uv';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['day', 'pv', 'uv', 'create_time', 'update_time'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'day' => 'Day',
            'pv' => 'Pv',
            'uv' => 'Uv',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
