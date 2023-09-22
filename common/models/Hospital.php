<?php

namespace common\models;

use Yii;

/**
 * This is the model class for collection "banners".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $name
 * @property mixed $img
 * @property mixed $description
 * @property mixed $type
 * @property mixed $slug
 * @property mixed $slug_category
 * @property mixed $branch
 * @property mixed $address
 * @property mixed $content
 */
class Hospital extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return ['news', 'hospitals'];
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'name',
            'img',
            'description',
            'type',
            'slug',
            'slug_category',
            'branch',
            'address',
            'content',
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
            [['name'], 'safe']
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => Yii::t('app', 'ID'),
        ];
    }
}
