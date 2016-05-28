<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property integer $id
 * @property integer $order_id
 * @property string $name
 * @property integer $size
 * @property string $fileName
 *
 * @property Order $order
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'name', 'size', 'fileName'], 'required'],
            [['order_id', 'size'], 'integer'],
            [['name', 'fileName'], 'string', 'max' => 255],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'name' => 'Name',
            'size' => 'Size',
            'fileName' => 'File Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }
}
