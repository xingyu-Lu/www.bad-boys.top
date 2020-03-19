<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog_articles".
 *
 * @property int $id
 * @property string $content 文章内容
 * @property int $status 0:正常；1:下线
 * @property string $category 分类
 * @property string $tag 标签
 * @property string $author 作者
 * @property int $create_time
 * @property int $update_time
 */
class BlogArticles extends \yii\db\ActiveRecord
{
    const NORMAL_STATUS = 0;
    const DISABLE_STATUS = 1;

    const CATEGORY_0 = 0;
    const CATEGORY_1 = 1;
    const CATEGORY_2 = 2;
    const CATEGORY_3 = 3;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content', 'title'], 'required'],
            [['status', 'create_time', 'update_time', 'count'], 'integer'],
            [['content', 'title'], 'string'],
            [['category', 'tag', 'author'], 'string', 'max' => 20],
            [['title'], 'string', 'max' => 30],
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
            'category' => 'Category',
            'tag' => 'Tag',
            'author' => 'Author',
            'count' => 'Count',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    public function getStatusList()
    {
        $arr = [
            self::NORMAL_STATUS => '正常',
            self::DISABLE_STATUS => '下线'
        ];

        return $arr;
    }

    public static function getCategoryList()
    {
        $arr = [
            self::CATEGORY_0 => 'PHP',
            self::CATEGORY_1 => 'Linux',
            self::CATEGORY_2 => '算法',
            self::CATEGORY_3 => '其他',
        ];

        return $arr;
    }
}
