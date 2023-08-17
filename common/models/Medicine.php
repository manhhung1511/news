<?php

namespace common\models;

use Yii;

/**
 * This is the model class for collection "banners".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $n
 * @property mixed $status
 */
class Medicine extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return ['news', 'medicines'];
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'name',
            'type',
            'category',
            'img',
            'subscribe',
            'link',
            'producer',
            'number',
            'slug',
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
