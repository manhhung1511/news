<?php

namespace common\models;

use Yii;

/**
 * This is the model class for collection "banners".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $name
 * @property mixed $status
 */
class Category extends \yii\mongodb\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_CATEGORY_CHILD = 2;
    const STATUS_INACTIVE = 0;
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return ['news', 'categories'];
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'name',
            'slug',
            'category_child',
            'status',
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
            [['name','category_child'], 'safe']
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Tên danh mục'),
            'category_child' => Yii::t('app', 'Danh mục con'),
            'status' => Yii::t('app', 'Trạng thái'),
        ];
    }
}
