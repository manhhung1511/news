<?php

namespace common\models;

use Yii;

/**
 * This is the model class for collection "banners".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $category
 * @property mixed $title
 * @property mixed $description
 * @property mixed $image
 * @property mixed $status
 */
class News extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public static function collectionName()
    {
        return ['news', 'news'];
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'category',
            'title',
            'category_id',
            'category_child',
            'name_category_child',
            'content',
            'image',
            'view',
            'status',
            'slug',
            'author',
            'created_at',
            'updated_at'
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['category','image','required', 'message' => 'Vui lòng chọn danh mục'],
            [['category','title','description','image','status', 'author'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => Yii::t('app', 'ID'),
            'category' => Yii::t('app', 'Danh mục'),
            'title' => Yii::t('app', 'Tiêu đề'),
            'image' => Yii::t('app', 'Image'),
            'description' => Yii::t('app', 'Mô tả'),
            'status' => Yii::t('app', 'Trạng thái')
        ];
    }
}
